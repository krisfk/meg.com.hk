<?php 
require_once 'functions.php';
require_once 'meekrodb.2.3.class.php';
class Model{

	public $setting;
	
	function __construct(){
	DB::$host = 'localhost';
//		DB::$port = '3306';
		DB::$user = 'web1u2';
		DB::$password = 'VA84away';
//		DB::$dbName = 'meghongk_db3';		
		DB::$dbName = 'web1db2';		
		DB::$encoding = 'utf8';
		$this->loadSetting();
	}

	function __destruct(){
		
	}
	
	private function loadSetting(){
		$this->setting = DB::queryFirstRow("SELECT * FROM setting LIMIT 1");
	}

	public function createPaper($part){
		$create_time = date('Y-m-d H:i:s');
		$expired_time = date('Y-m-d H:i:s', time() + $this->part2Time($part));
		$code = md5(time() . rand(1000, 9999));
		DB::insert('paper', array(
		  'code' => $code,
		  'part' => $part,
		  'ip' => getIp(),
		  'create_time' => $create_time,
		  'expired_time' => $expired_time
		));
		return $code;
	}
	
	public function getPaper($paperCode){
		$paper = DB::queryFirstRow("SELECT * FROM paper WHERE code=%s", $paperCode);
		$paper['questions'] = DB::query("SELECT * 
										FROM paper_detail AS pd 
										LEFT JOIN ".$this->part2Table($paper['part'])." AS q
										ON pd.question_id = q.id
										WHERE pd.paper_id = " . $paper['id']);		
		return $paper;
	}
	
	public function paperFinish($paper){
		$timeLimit = $this->part2Time($paper['part']);
		$now = time();
		if($paper['create_time'] + $timeLimit > $now){
			$finish_time = $paper['create_time'] + $timeLimit;
		} else {
			$finish_time = $now;
		}
		DB::update('paper', array(
		  'finish_time' => date('Y-m-d H:i:s', $finish_time)
		), "id=".$paper['id']);	
	}
	
	public function getNextQuestion(&$paper){
		$question = false;
		$exceptArr = array();
		foreach($paper['questions'] as $q){
			if(empty($q['user_answer'])){
				$question = $q;
			} else {
				array_push($exceptArr, $q['question_id']);
			}
		}
		$except = implode($exceptArr, ',');
		if(!$question){
			$randCount = $this->part2RandCount($paper['part']);
			$curCount = count($paper['questions']);
			if($randCount > $curCount){
				$question = $this->createQuestion($paper, $except);
				array_push($paper['questions'], $question);
			}
		}
		return $question;
	}
	
	private function createQuestion($paper, $except){
		$question = false;
		$sql = "SELECT * FROM ".$this->part2Table($paper['part'])." WHERE 1=1";
		if(!empty($except)) $sql .= " AND id NOT IN (".$except.")";
		$questions = DB::query($sql);
		$question_index = array_rand($questions, 1);
		$question = $questions[$question_index];
		DB::insert('paper_detail', array(
		  'paper_id' => $paper['id'],
		  'question_id' => $question['id'],
		  'create_time' => now()
		));
		return $question;
	}
	
	public function answer($code, $answer){
		$paper = $this->getPaper($code);
	//	dump($paper);
		$question = $this->getLastQuestion($paper);
	//	dump($question);
		DB::update('paper_detail', array(
		  'user_answer' => $answer,
		  'answer_time' => now()
		), "paper_id=".$paper['id']." and question_id=".$question['id']);
	//	dump(123);
		//exit;
	}
	
	private function getLastQuestion($paper){
		return $paper['questions'][count($paper['questions'])-1];
	}
	
	public function getLastAnswer($paper){
		$result = false;
		for($i=count($paper['questions'])-1;$i>=0;$i--){
			if(!empty($paper['questions'][$i]['user_answer'])) {
				$result = $paper['questions'][$i];
				break;
			}
		}
		return $result;
	}
	
	public function getCorrectCount($paper){
		$result = 0;
		foreach($paper['questions'] as $q){
			if($this->isCorrect($q)){
				$result ++;
			}
		}
		return $result;
	}
	
	public function isPass($part, $correctCount){
		return $correctCount >= $this->part2PassCount($part);
	}
	
	private function isCorrect($question){
		return $question['user_answer'] == $question['answer'];
	}
	
	private function getP2Categories(){
		$categoies = DB::query("SELECT category, count(*) FROM question_p2 GROUP BY category");
		return $categories;
	}
	
	private function part2Table($part){
		return 'question_en';
	}
	
	public function part2RandCount($part){
		return $this->setting['rand_count'];
	}
	
	public function part2PassCount($part){
		return $this->setting['pass_count'];
	}
	
	private function part2Time($part){
		return $this->setting['time'];
	}

}
?>
