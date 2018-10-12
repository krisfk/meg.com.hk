// JavaScript Document

$(document).ready(function() {
			
			$("#fancybox-R").click(function() {
				$.fancybox.open([
					{
						href : './images/info/R1.jpg',
						title : '石蔭 考試路線圖(一)'
					}, {
						href : './images/info/R2.jpg',
						title : '石蔭 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-B").click(function() {
				$.fancybox.open([
					{
						href : './images/info/B1.jpg',
						title : '澤安道 考試路線圖(一)'
					}, {
						href : './images/info/B2.jpg',
						title : '澤安道 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-H").click(function() {
				$.fancybox.open([
					{
						href : './images/info/H1.jpg',
						title : '跑馬地 考試路線圖(一)'
					}, {
						href : './images/info/H2.jpg',
						title : '跑馬地 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-P").click(function() {
				$.fancybox.open([
					{
						href : './images/info/P1a.jpg',
						title : '培正道 考試路線圖(1A)'
					}, {
						href : './images/info/P2a.jpg',
						title : '培正道 考試路線圖(2A)'
					}, {
						href : './images/info/P2.jpg',
						title : '培正道 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-S").click(function() {
				$.fancybox.open([
					{
						href : './images/info/S1a.jpg',
						title : '油塘 考試路線圖(1A)'
					}, {
						href : './images/info/S2a.jpg',
						title : '油塘 考試路線圖(2A)'
					}, {
						href : './images/info/S2.jpg',
						title : '油塘 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-T").click(function() {
				$.fancybox.open([
					{
						href : './images/info/T1.jpg',
						title : '天光道 考試路線圖(一)'
					}, {
						href : './images/info/T2.jpg',
						title : '天光道 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-TT").click(function() {
				$.fancybox.open([
					{
						href : './images/info/TT1.jpg',
						title : '忠義街 考試路線圖(一)'
					}, {
						href : './images/info/TT2.jpg',
						title : '忠義街 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
			$("#fancybox-W").click(function() {
				$.fancybox.open([
					{
						href : './images/info/W1.jpg',
						title : '葵盛圍 考試路線圖(一)'
					}, {
						href : './images/info/W2.jpg',
						title : '葵盛圍 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});
			
 $("#fancybox-SK").click(function() {
				$.fancybox.open([
					{
						href : './images/info/SK1.jpg',
						title : '掃桿埔 考試路線圖(一)'
					}, {
						href : './images/info/SK2.jpg',
						title : '掃桿埔 考試路線圖(二)'
					}
				], {
					closeBtn  : false,
					
					helpers : {
					
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
				});
			});



		});