// JavaScript Document
function deleteRow(obj) {
 	var d = obj.id;
	//var s = d.split('_');
	document.getElementById(d+"_doc").innerHTML='';
	document.getElementById(d).value = '';
}

function cloneRow()
  {
   var row = document.getElementById("rowToClone"); // find row to copy
   var table = document.getElementById("tableToModify"); // find table to append to
   var clone = row.cloneNode(true);
   clone.id = "rowToClone"; // change id or other attributes/contents
   table.appendChild(clone); // add new row to end of table
}

function disableddays()
{
    alert("jitendra");
}
			
$(document).ready(function() {
	var baseUrl = $("#baseurl").val();
	/*---------SETTINGS PAGE VALIDATION----------------*/		
			$("#language").select2({
                placeholder: "Select your country"
            });
			
			$('#settings').validate(
             {
              rules: {
                system_name: {
                  minlength: 6,
                  required: true
                },
				system_title: {
                  minlength: 6,
                  required: true
                },
				address: {
                  minlength: 6,
                  required: true
                },
				phone: {
                  minlength: 10,
                  required: true,
				  digits: true
                },
                system_email: {
                  required: true,
                  email: true
                },
				currency: {
				  minlength: 3,
                  required: true
                },
				
                language: {
                  required: true
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			 
/*---------NEW EMPLOYEE PAGE VALIDATION----------------*/
			$("#branch").select2({
                placeholder: "Select Branch"
            });
			
			$("#dept_id").select2({
                placeholder: "Select Department"
            });
		
			$("#title").select2({
                placeholder: "Select Title"
            });
			
			$("#gaurdian_option").select2({
                placeholder: "Gaurdian"
            });
			
			$("#sex").select2({
                placeholder: "Gender"
            });
			
			/*$("#religion").select2({
                placeholder: "Religion"
            });*/
			
			$("#marital").select2({
                placeholder: "Martial Status"
            })
			
			$("#nationality").select2({
                placeholder: "Select your nationality"
            })
			
			$("#country").select2({
                placeholder: "Country"
            });
			
			$("#province").select2({
                placeholder: "Province"
            })
			
			$("#designation").select2({
                placeholder: "Designations"
            })
			
			$("#doctype").select2({
                placeholder: "Docs"
            })
			
			$("#contactinfo").select2({
                placeholder: "Contact Info"
            })
			
			/*$("#qualification").select2({
                placeholder: "qualification"
            })*/
			<!------GET STATE LIST AJAX FUNCTION------>
			
			$("#country").change(function(){
				$("#loading").html( "" );
				var cntid = $(this).val();
				$.ajax({
					url: baseUrl+"modal/getStateList",
					type: "post",
					data: {'id':cntid},
					cache: false,
					beforeSend: function () {
					$('#loading').html('<img src="'+baseUrl+'/assets/img/loaders/1.gif" alt="" width="24" height="24">');
					},
					success: function(msg){
						$("#state").html(msg);
						$("#loading").html('');
						$("#province").select2({
							placeholder: "Province"
						})
					},
					error:function(){
						$("#state").val('Not Found');
					}
				});
			});
			
			<!------ADD ATTACHMENT FUNCTION------>
			
			
			/*$('#docs').change(function(){
				var doctype = $('#doctype').val();
				var file = $('#docs').val();
				//var file = $("#docs")[0].files[0];
				//alert(file);
				
				$("#tblData tbody").append( 
				"<tr class='new'>"+ 
				"<td>"+doctype.replace(/_/g, ' ').toUpperCase()+"				<input type='hidden' name='doctype[]' value='"+doctype+"' /></td>"+ 
				"<td>"+file+"<input type='hidden' name='file[]' value='"+file+"'/></td>"+ 
				"<td><a href='javascript:;' onclick='deleteRow(this)' class='deldocs btn btn-danger'><i class='fa fa-times-circle'></i></a></td>"+ "</tr>"); 
			});*/
			
			
			<!------ADD CONTACT INFO FUNCTION------>
			
			
			
			
			/*$('#addContactInfo').click(function(){
				var contactinfo = $('#contactinfo').val();
				var contactdata = $('#contactdata').val();
				if(contactinfo=="email")
				{
					var expr =/\S+@\S+\.\S+/;
					if(!expr.test(contactdata))
					{
						alert("Invalid Email");
						$('#contactdata').val(' ');
						return false;
					}
				}
				$("#contactTable tbody").append(
				/*"<tr class='new'><td colspan='3'><strong>"+contactinfo.toUpperCase()+" Added !</strong></td></tr>"+  
				"<tr class='new'>"+ 
				"<td><input class='form-control valid' type='text' name='"+contactinfo+"[]' value='"+contactdata+"' /></td>"+ 
				"<td><input type='radio' name='default_"+contactinfo+"' value='"+contactdata+"' /></td>"+ 
				"<td><a href='javascript:;' onclick='deleteRow(this)' id='contactdel' class='btn btn-danger'><i class='fa fa-times-circle'></i></a></td>"+ "</tr>");
				$('#contactdata').val(' '); 
			});*/
			
			<!------EMPLOYEE_1 FORM VALIDATION------>
			
			/*$('#employeeForm_1').validate(
             {
              rules: {
				 branch: {
                  required: true
                }, 
				dept_id: {
                  required: true
                },
                title: {
                  required: true
                },
				fname: {
                  required: true
                },
				lname: {
                  required: true
                },
				gaurdian_option: {
                  required: true,
				  /*digits: true
                },
                gaurdian_name: {
                  required: true,
                  //email: true
                },
				sex: {
                  required: true
                },
				
                religion: {
                  required: true
                },
				marital: {
                  required: true,
                },
				dob: {
                  required: true
                },
				
                country: {
                  required: true
                },
				province: {
                  required: true,
                },
				city: {
                  required: true
                },
				
                nationality: {
                  required: true
                },
				postal: {
                  required: true
                },
				
                address: {
                  required: true
                }
				
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });*/
			 
			<!------RESUME ATTACTMENT IN EMPLOYEE NEW------> 
			$('#resume').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(resume)' class='deldoc'><i class='fa fa-times-circle'></i></a>";
				$("#resume_doc").html(file.name+" "+times);
				
			});
			
			<!------OFFER LETTER ATTACTMENT------> 
			$('#offer').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(offer)'><i class='fa fa-times-circle'></i></a>";
				$("#offer_doc").html(file.name+" "+times);
				
			});
			
			<!------JOINING LETTER ATTACTMENT------> 
			$('#joining_letter').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(joining_letter)'><i class='fa fa-times-circle'></i></a>";
				$("#joining_letter_doc").html(file.name+" "+times);
				
			});
			
			<!------CONTRACT LETTER ATTACTMENT------> 
			$('#contract').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(contract)'><i class='fa fa-times-circle'></i></a>";
				$("#contract_doc").html(file.name+" "+times);
				
			});
			
			
			<!------ID PROOF ATTACTMENT------> 
			$('#id_proof').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(id_proof)'><i class='fa fa-times-circle'></i></a>";
				$("#id_proof_doc").html(file.name+" "+times);
				
			});
			
			<!------ID PROOF ATTACTMENT IN NEW EMPLOYEE------> 
			$('#other').change(function(){
				
				var file = $(this)[0].files[0];
				var times = "<a href='javascript:;' onclick='deleteRow(other)'><i class='fa fa-times-circle'></i></a>";
				$("#other_doc").html(file.name+" "+times);
				
			});
			
			<!------CALENDER------> 
			$('.dob').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
			
			$('.reg_date').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
			<!------QUALIFICATION CLONE FUNCTION IN NEW EMPLOYEE------> 
			
			 $("#tableData").on('click', 'button.addButton', function() {
			  
					var $tr = $(this).closest('tr');
					var allTrs = $tr.closest('table').find('tr');
					var lastTr = allTrs[allTrs.length-1];
					var $clone = $(lastTr).clone();
					$clone.find('td').each(function(){
						var el = $(this).find(':first-child');
						var id = el.attr('id') || null;
						if(id) {
							var i = id.substr(id.length-1);
							var prefix = id.substr(0, (id.length-1));
							el.attr('id', prefix+(+i+1));
							el.attr('name', prefix+(+i+1));
						}
					});
					$clone.find('input:text').val('');
					$tr.closest('table').append($clone);
				});
				
			
			<!------EMPLOYEE VALDATION------>  
			$('#employeeForm').validate(
             {
              rules: {
				 
				fname: {
                  required: true
                },
				lname: {
                  required: true
                },
				gaurdian_option: {
                  required: true,
				  /*digits: true*/
                },
                gaurdian_name: {
                  required: true,
                  //email: true
                },
				sex: {
                  required: true
                },
				
                religion: {
                  required: true
                },
				marital: {
                  required: true,
                },
				dateofbirth: {
                  required: true
                },
				
                country: {
                  required: true
                },
				province: {
                  required: true,
                },
				city: {
                  required: true
                },
				
                nationality: {
                  required: true
                },
				passport: {
                  required: true,
				  //digits: true
                },
				postal: {
                  required: true,
				  digits: true
                },
				
                address: {
                  required: true
                },
				mobile: {
                  required: true,
				  digits: true
                },
				phone: {
				  digits: true
                },
				account_number: {
				  digits: true
                },
                email: {
                  required: true,
				  email: true
                },
				emp_id: {
                  required: true,
                },
				designation: {
                  required: true,
                },
				joining_date: {
                  required: true,
                },
				 branch: {
                  required: true
                }, 
				dept_id: {
                  required: true
                },
				password: {
                  required: true
                }, 
                cnpassword: {
                  required: true,
				  equalTo: "#password"
                },
				roles: {
                  required: true
                },
				join_date: {
                  required: true
                },
				salary: {
                  required: true,
				  digits:true
                },
				emp_type: {
                  required: true,
                }
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });
			 
			 
			<!------USER ROLE VALIDATION------> 
			$('#userRoleForm').validate(
             {
              rules: {
				 password: {
                  required: true
                }, 
                cnpassword: {
                  required: true,
				  equalTo: "#password"
                },
				roles: {
                  required: true
                }
				
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             }); 
			 
			 
			<!------ATTENDANCE VALIDATION------> 
			
			$("#employee").select2({
                placeholder: "select employee"
            })
			
			$('.attdate').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left",
				daysOfWeekDisabled: [2,6],
				datesDisabled:disabledays
			});
			
			/*$('.attdate')
			.datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0,
				pickerPosition: "bottom-left",
				
			})
			.on('show', function(ev){
				daysOfWeekDisabled: [0,6];
				//alert("hello");
			});*/
			
			
			
			
			$('.time_in').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 1,
				minView: 0,
				maxView: 1,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
		
			$('.time_out').datetimepicker({
				language:  'en',
				weekStart: 1,
				todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 1,
				minView: 0,
				maxView: 1,
				forceParse: 0,
				pickerPosition: "bottom-left"
			});
			$('#attendanceForm').validate(
             {
              rules: {
				 password: {
                  required: true
                }, 
                cnpassword: {
                  required: true,
				  equalTo: "#password"
                },
				roles: {
                  required: true
                }
				
              },
              highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
              },
              success: function(element) {
                element
                .text('Valid!').addClass('valid')
                .closest('.form-group').removeClass('has-error').addClass('has-success');
              }
             });  
			 
			 		 
});