// JavaScript Document

 $(document).ready(function(){
			$(".delete").click(function(){
				if(confirm("Do you really want to delete the record?"))
					return true;
				else
					return false;
		});
	
		$("#userid").click(function(){
							
			$("#id_form").slideDown("slow");
			$("#column_form").slideUp("slow");
		
		});
		
		$("#bycolumn").click(function(){
		
			$("#column_form").slideDown("slow");
			$("#id_form").slideUp("slow");
		
		});
		
		$(".slideup").click(function(){
			
			$(this).parent().slideUp("slow");
		
		});
		
		$(".find1").click(function(){
			
				if($(".text_box1").val() == ""){
				
					alert("please enter value for search");
					return false;
				
				}
				
		});
		
		$(".find2").click(function(){
		
			$value = $("#id").val();
			if($("#id").val() == ""){
				
					alert("please enter id");
					return false;
			}
			
			if(isNaN($value)){
			
				alert("please enter a number");
				return false;
			
			}
		
		});
		
		$(".find3").click(function(){
			
				if($("#value").val() == ""){
				
					alert("please enter column name");
					return false;
				
				}
				
		});
		
		$("tr th a").click(function(){
		
			$(this).addClass("sasas");
		
		});
		
		$("#methods_link").click(function(){
		
			$("#method_table").slideDown("slow");
			$(this).hide();
			$("#hide").show();
				
		});
		
		
		
	});