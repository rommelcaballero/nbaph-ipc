/*
	All rights reserved
	2013-09-21
	Developer : Paulon Zervoulakus
	Email : pau_z2003@yahoo.com
	Settings :
		today = date 
		data = array of event for the month
		connection = ajax connection
*/
(function($){
	$.fn.calendar = function(options){
		var settings = $.extend({today:null,data:null,connection:null},options);
		var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
		var loadCalendar = function(obj){
			var month = new Date(settings.today).getMonth();
			var year = new Date(settings.today).getFullYear();
			var daysInMonth = new Date(year, month+1, 0).getDate();
			$(obj).find(".cell-title").html(months[new Date(settings.today).getMonth()] + ' ' + year);					
			$(obj).find(".data-cell").html(function(){
				var str, weekday=0;
				var a=1, nowweek; 
				str = "<div class='row-fluid'>";						
				while(a<=daysInMonth){
					nowweek = new Date(months[new Date(settings.today).getMonth()] + " " + a + ", " + year).getDay();												
					if(weekday == nowweek){
						str += "<div class='cell' id='date_"+year+"_"+(month+1)+"_"+a+"'>" + a + "</div>";
						a++;								
					}else{
						str += "<div class='cell outofdate'></div>";
					}						
					weekday++;
					if(weekday==7){
						str += "</div><div class='row-fluid'>";
						weekday = 0;
					}							
				}
				str += "</div>";
				return str;
			});
		};
		
		var loadContainer = function(obj){
			$(obj).append("<div class='row-fluid'><div class='cell-title-prev' id='cell-title-prev'></div><div class='cell-title'>September</div><div class='cell-title-next' id='cell-title-next'></div></div>");
			$(obj).append("<div class='row-fluid'><div class='cell-header'>Sun</div><div class='cell-header'>Mon</div><div class='cell-header'>Wed</div><div class='cell-header'>Tue</div><div class='cell-header'>Thu</div><div class='cell-header'>Fri</div><div class='cell-header'>Sat</div></div>");
			$(obj).append("<div class='data-cell'>");
		};				
		
		var loadData = function(){			
			var y,m,d;
			for(var a=0; a<settings.data.length; a++){
				y = new Date(settings.data[a].event_date).getFullYear();	
				m = new Date(settings.data[a].event_date).getMonth()+1;
				d = new Date(settings.data[a].event_date).getDate();
				$(".cell[id=date_"+y+"_"+m+"_"+d+"]").addClass('has-data').attr({'data-title':settings.data[a].title});
				$(".cell[id=date_"+y+"_"+m+"_"+d+"]").popover({trigger:'hover',placement:'top', color:'#444',container:".cell[id=date_"+y+"_"+m+"_"+d+"]"});
				if(settings.data[a].click_through !== "" && settings.data[a].click_through != null){
					$(".cell[id=date_"+y+"_"+m+"_"+d+"]").html("<a target='_blank' href='" + settings.data[a].click_through + "'>" + $(".cell[id=date_"+y+"_"+m+"_"+d+"]").html() + "</a>");
				}else{
					$(".cell[id=date_"+y+"_"+m+"_"+d+"]").html($(".cell[id=date_"+y+"_"+m+"_"+d+"]").html());
				}
			}
		};
		return this.each(function(){
			var obj = this;
			loadContainer(obj);
			loadCalendar(obj);
			loadData();
			$(obj).find("#cell-title-next").click(function(){
				var curr_date = new Date(settings.today)
				var temp = curr_date.setMonth(new Date(settings.today).getMonth()+1);
				var month = new Date(temp).getMonth();
				var year = new Date(temp).getFullYear();
				$.ajax({
					type:'POST',
					url:settings.connection,
					dataType:'json',
					data:{month:(month+1),year:year}
				}).done(function(data){
					if(data !== undefined){
						var new_data = [];
						if(data.length > 0){						
							for(var a=0; a<data.length; a++){
								new_data.push({title:data[a].title,event_date:data[a].date_of_event,click_through:data[a].click_through});
							}
						}																
						settings.data = new_data;
					}	
					settings.today = temp;
					loadCalendar(obj);
					loadData();	
				});
			});
			$(obj).find("#cell-title-prev").click(function(){
				var curr_date = new Date(settings.today)
				var temp = curr_date.setMonth(new Date(settings.today).getMonth()-1);
				var month = new Date(temp).getMonth();
				var year = new Date(temp).getFullYear();
				$.ajax({
					type:'POST',
					url:settings.connection,
					dataType:'json',
					data:{month:(month+1),year:year}
				}).done(function(data){
					if(data !== undefined){
						var new_data =[];
						if(data.length > 0){						
							for(var a=0; a<data.length; a++){
								new_data.push({title:data[a].title,event_date:data[a].date_of_event,click_through:data[a].click_through});
							}
						}					
						settings.data = new_data;
					}	
					settings.today = temp;
					loadCalendar(obj);
					loadData();
				});
			});
		});
	}
})(jQuery);