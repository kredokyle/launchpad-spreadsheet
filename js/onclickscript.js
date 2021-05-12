const database=firebase.database();
const rootRef=database.ref();
const adminRef=database.ref('admin');
const categoryRef=database.ref('category');
const questionRef=database.ref('question');
const adminRefId=database.ref('admin/'+sessionStorage.getItem('sessionId'));
const studentRef=database.ref('student');
const resultsRef=database.ref('assessment_result');
const facultyRef=database.ref('faculty');
const courseCodeRef=database.ref('course_code');
const courseRef=database.ref('course');
var CCEmean=0, CEEmean=0, CBAEmean=0, CAFAEmean=0, CTEmean=0,CHEmean=0,CHSEmean=0,CASEmean=0,CCJEmean=0,CAEmean=0;

var numOfQuestions=0;

function questionCounter(){
    questionRef.on('value', snap=>{
        snap.forEach(element=>{
            numOfQuestions++;
        });
        $('#loaderReportsFaculty').hide();
    });
}

/*** LOG IN ***/
function login(){
    var uname=document.getElementById("username").value.toLowerCase();
    var pword=document.getElementById("password").value;

    if($.trim(uname).length===0||$.trim(pword).length===0){
        document.getElementById("errorMessage").innerHTML='<p>Please fill in all fields</p>';
    }else{
    var queryUsername=adminRef.orderByChild('username').equalTo(uname);

    queryUsername.on('value', snap=>{ //CHECK ALL username IN THE DATABASE
        if(snap.val()!==null){ // USERNAME EXISTS
            queryUsername.on('child_added', snap=>{
                var checkPassword=snap.child('password').val();
                if(checkPassword===pword){
                    // STORE CURRENTLY LOGGED IN USER INFORMATION
                    if(typeof(Storage)!=="undefined"){ // BROWSER SUPPORTS SESSION/WEB STORAGE
                        sessionStorage.setItem('sessionId', snap.key);
                        sessionStorage.setItem('sessionUsername', uname);
                        sessionStorage.setItem('sessionAdminName', snap.child('admin_name').val());
                        sessionStorage.setItem('sessionType', snap.child('type').val());
                    }else{
                        document.getElementsByClassName('main').innerHTML="Sorry, your browser does not support web storage. Please contact your IT technician.";
                    }
                    // GO TO DASHBOARD
                    window.location.replace("dashboard.html");
                }else{
                    //INCORRECT PASSWORD
                    document.getElementById("errorMessage").innerHTML='<p>The username/password you entered is incorrect</p>';
                } 
            });
        }else{
            document.getElementById("errorMessage").innerHTML='<p>The username/password you entered is incorrect</p>';
        }
    });
}
}

/*** SHOW/HIDE ACCOUNT SIDENAV***/
function openAccountSidenav() {
    if(document.getElementById("accountSidenav").style.width == "250px"){
        document.getElementById("accountSidenav").style.width = "0";
    }else{
        document.getElementById("accountSidenav").style.width = "250px";
    }
}

/*** ACCOUNT MODAL ***/
function enableSaveButton(){
    document.getElementById('btnSaveUser').disabled=false;
}

/*** UPDATE ACCOUNT ***/
function saveAccountInfo(){
    var saveUsername=document.getElementById('infoUname').value;
    var saveFullname=document.getElementById('infoFname').value;

    if($.trim(saveUsername).length===0||$.trim(saveFullname).length===0){
        document.getElementById('errorAccountAllFields').innerHTML='<p class="alert alert-danger mt-2" role="alert">Please fill in all fields.</p>';
    }else{
        if(saveUsername===sessionStorage.getItem('sessionUsername')){
            adminRefId.update({
                admin_name: saveFullname
            });
            sessionStorage.setItem('sessionAdminName', saveFullname);
            $('#account').modal('hide');
            $('#alertUpdate').modal('show');
            setTimeout("location.reload(true);",2000);
        }else{
            var qry=adminRef.orderByChild('username').equalTo(saveUsername);
            qry.on('value', snap=>{
                if(snap.val()!==null){
                    document.getElementById('errorAccountUsername').innerHTML='<p class="alert alert-danger mt-2" role="alert"><b>Username already exists.</b> Enter a new one.</p>';
                }else{
                    adminRefId.update({
                        admin_name: saveFullname,
                        username: saveUsername
                    });
                    sessionStorage.setItem('sessionAdminName', saveFullname);
                    sessionStorage.setItem('sessionUsername', saveUsername);
                    $('#account').modal('hide');
                    $('#alertUpdate').modal('show');
                    setTimeout("location.reload(true);",2000);
                }
            });
        }
    }
}

//CHANGE PASSWORD MODAL 1
// CHECK EXISTING PASSWORD MODAL
function checkExistingPassword(){
    var existingPword=document.getElementById('existingPassword').value;
    var qry=adminRef.orderByKey().equalTo(sessionStorage.getItem('sessionId'));

    qry.on('child_added', snap=>{
        if(snap.child('password').val()!==existingPword){
            document.getElementById('errorPassword1').innerHTML='<p class="alert alert-danger mt-2" role="alert"><b>Incorrect password</b></p>';
        }else{
            sessionStorage.setItem('existingPassword', existingPword);
            $('#changePassword').modal('hide');
            $('#changePassword2').modal('show');
        }
    });
}

//CHANGE PASSWORD MODAL 2
function saveAccountSecurity(){
    var newpword1=document.getElementById('newPassword1').value;
    var newpword2=document.getElementById('newPassword2').value;

    if(newpword1===sessionStorage.getItem('existingPassword')){
        document.getElementById('errorPassword2').innerHTML='<p class="alert alert-danger mt-2" role="alert">Your new password should not be the same with the old one.</p>';
    }else{
        if(newpword1!==newpword2){
            document.getElementById('errorPassword2').innerHTML='<p class="alert alert-danger mt-2" role="alert">Password does not match the confirm password.</p>';
        }else{
            adminRefId.update({
                password: newpword1
            });
            sessionStorage.removeItem('existingPassword');
            $('#account').modal('hide');
            $('#changePassword2').modal('hide');
            $('#alertPasswordChange').modal('show');
            setTimeout("location.reload(true);",2000);
        }
    }
}

// DELETE REMOVE ACCOUNT
function removeAccount(){
    adminRef.child(sessionStorage.getItem('sessionId')).remove();
    window.location.replace('login.html');
}

/*** REPORTS - RESPONSES ***/
function reportsResponses(collegeCode){
    var studentRef=database.ref('student');
    var studentArray=[];
    var firstYear=secondYear=thirdYear=fourthYear=fifthYear=0;
    
    resultsRef.on('value', snap=>{
        snap.forEach(function(codeSnap){       
            resultsRef.child(codeSnap.key).on('value', studentSnap=>{
                studentSnap.forEach(function(element){
                    if(!studentArray.includes(element.key)){
                        studentArray.push(element.key);
                    }
                });         
            });
        });
        studentArray.forEach(stud=>{
            studentRef.child(stud).on('value', snap=>{
                if(snap.child('college_code').val()===collegeCode){
                    switch(snap.child('year_level').val()){
                        case 1: firstYear++;  break;
                        case 2: secondYear++; break;
                        case 3: thirdYear++; break;
                        case 4: fourthYear++;break;
                        case 5: fifthYear++; break;
                    }
                }
            });    
        });
        
        setTimeout(() => {
            document.getElementById('loaderReportsResponses').style.display="none";
            var nTotal=firstYear+secondYear+thirdYear+fourthYear+fifthYear;
            if(firstYear!=0){
                document.getElementById('firstYearNumber').innerHTML=firstYear;
                document.getElementById('firstYearPercent').innerHTML=calculatePercentage(firstYear, nTotal).toFixed(2)+"%";
            }else{
                document.getElementById('firstYearNumber').innerHTML="-";
                document.getElementById('firstYearPercent').innerHTML="-";
            }

            if(secondYear!=0){
                document.getElementById('secondYearNumber').innerHTML=secondYear;
                document.getElementById('secondYearPercent').innerHTML=calculatePercentage(secondYear, nTotal).toFixed(2)+"%";
            }else{
                document.getElementById('secondYearNumber').innerHTML="-";
                document.getElementById('secondYearPercent').innerHTML="-";
            }

            if(thirdYear!=0){
                document.getElementById('thirdYearNumber').innerHTML=thirdYear;
                document.getElementById('thirdYearPercent').innerHTML=calculatePercentage(thirdYear, nTotal).toFixed(2)+"%";            
            }else{
                document.getElementById('thirdYearNumber').innerHTML="-";
                document.getElementById('thirdYearPercent').innerHTML="-";
            }

            if(fourthYear!=0){
                document.getElementById('fourthYearNumber').innerHTML=fourthYear;
                document.getElementById('fourthYearPercent').innerHTML=calculatePercentage(fourthYear, nTotal).toFixed(2)+"%";
            }else{
                document.getElementById('fourthYearNumber').innerHTML="-";
                document.getElementById('fourthYearPercent').innerHTML="-";
            }

            if(fifthYear!=0){
                document.getElementById('fifthYearNumber').innerHTML=fifthYear;
                document.getElementById('fifthYearPercent').innerHTML=calculatePercentage(fifthYear, nTotal).toFixed(2)+"%";
            }else{
                document.getElementById('fifthYearNumber').innerHTML="-";
                document.getElementById('fifthYearPercent').innerHTML="-";
            }
            
            document.getElementById('reportsResponsesTotal').innerHTML=nTotal;
            document.getElementById('btnPrint').disabled=false;
        }, 6000);
    });

    var collegeRef=database.ref('college/'+collegeCode);
    collegeRef.on('value', snap=>{
        document.getElementById('responsesSelectedCollege').innerHTML= '<h4>' + snap.child('college_name').val() + '<img id="loaderReportsResponses" src="images/loader.gif" style="width: 55px;"></h4>';
    });

    function calculatePercentage(n, T){
        return n/T*100;
    }
}


/***** REPORTS-COLLEGE *****/
function reportsCollege(collegeCode){
    var overall=[];
    var Q1=[], Q2=[], Q3=[], Q4=[], Q5=[], Q6=[], Q7=[], Q8=[], Q9=[], Q10=[], Q11=[], Q12=[], Q13=[], Q14=[], Q15=[], Q16=[], Q17=[], Q18=[],Q19=[];
                
                courseRef.orderByChild('college_code').equalTo(collegeCode).on('value', function(element){ 
                    element.forEach(function(courseTitle){
                        courseCodeRef.orderByChild('course_title').equalTo(courseTitle.key).on('value', function(codeSnap){
                            codeSnap.forEach(function(code){
                                resultsRef.child('/'+code.key).on('value', function(resultSnap){
                                    resultSnap.forEach(function(studentSnap){
                                        studentSnap.forEach(function(snap){
                                            resultsRef.child('/'+code.key+'/'+studentSnap.key+'/'+snap.key).on('value', function(data){
                                                if(Number.isInteger(data.val())){
                                                    overall.push(data.val());
                                                    console.log("Student: "+studentSnap.key+"\n"+snap.key+":"+data.val());
                                                }
                                                

                                                if (snap.key==='Q1'){
                                                    Q1.push(data.val());
                                                }else if (snap.key==='Q2'){
                                                    Q2.push(data.val());
                                                }else if (snap.key==='Q3'){
                                                    Q3.push(data.val());
                                                }else if (snap.key==='Q4'){
                                                    Q4.push(data.val());
                                                }else if (snap.key==='Q5'){
                                                    Q5.push(data.val());
                                                }else if (snap.key==='Q6'){
                                                    Q6.push(data.val());
                                                }else if (snap.key==='Q7'){
                                                    Q7.push(data.val());
                                                }else if (snap.key==='Q8'){
                                                    Q8.push(data.val());
                                                }else if (snap.key==='Q9'){
                                                    Q9.push(data.val());
                                                }else if (snap.key==='Q10'){
                                                    Q10.push(data.val());
                                                }else if (snap.key==='Q11'){
                                                    Q11.push(data.val());
                                                }else if (snap.key==='Q12'){
                                                    Q12.push(data.val());
                                                }else if (snap.key==='Q13'){
                                                    Q13.push(data.val());
                                                }else if (snap.key==='Q14'){
                                                    Q14.push(data.val());
                                                }else if (snap.key==='Q15'){
                                                    Q15.push(data.val());
                                                }else if (snap.key==='Q16'){
                                                    Q16.push(data.val());
                                                }else if (snap.key==='Q17'){
                                                    Q17.push(data.val());
                                                }else if (snap.key==='Q18'){
                                                    Q18.push(data.val());
                                                }else if (snap.key==='Q19'){
                                                    Q19.push(data.val());
                                                }
                                        });
                                    });      
                                }); 
                        //append to table	
                        setTimeout(() => {
                         $('#hidebody').show();
                         
                            if (calculateMean(Q1.reduce(add, 0), Q1.length)<4){
                                document.getElementById('mean1').innerHTML=calculateMean(Q1.reduce(add, 0),Q1.length ).toFixed(2);
                                document.getElementById('mean1').style.color='#FF0000';
                            }else{
                                document.getElementById('mean1').innerHTML=calculateMean(Q1.reduce(add, 0), Q1.length).toFixed(2);
                            }
                            if(calculateMean(Q2.reduce(add, 0), Q2.length)<4){
                                document.getElementById('mean2').innerHTML=calculateMean(Q2.reduce(add, 0), Q2.length).toFixed(2);
                                document.getElementById('mean2').style.color='#FF0000';
                            }else{
                                document.getElementById('mean2').innerHTML=calculateMean(Q2.reduce(add, 0), Q2.length).toFixed(2);
                            }
                            if (calculateMean(Q3.reduce(add, 0), Q3.length)<4){
                                document.getElementById('mean3').innerHTML=calculateMean(Q3.reduce(add, 0), Q3.length).toFixed(2);
                                document.getElementById('mean3').style.color='#FF0000';
                            }else{
                                document.getElementById('mean3').innerHTML=calculateMean(Q3.reduce(add, 0), Q3.length).toFixed(2);
                            }
                            if (calculateMean(Q4.reduce(add, 0), Q4.length)<4){
                                document.getElementById('mean4').innerHTML=calculateMean(Q4.reduce(add, 0), Q4.length).toFixed(2);
                                document.getElementById('mean4').style.color='#FF0000';
                            }else{
                                document.getElementById('mean4').innerHTML=calculateMean(Q4.reduce(add, 0), Q4.length).toFixed(2);
                            }
                            if (calculateMean(Q5.reduce(add, 0), Q5.length)<4){
                                document.getElementById('mean5').innerHTML=calculateMean(Q5.reduce(add, 0), Q5.length).toFixed(2);
                                document.getElementById('mean5').style.color='#FF0000';
                            }else{
                                document.getElementById('mean5').innerHTML=calculateMean(Q5.reduce(add, 0), Q5.length).toFixed(2);
                            }
                            if (calculateMean(Q6.reduce(add, 0), Q6.length)<4){
                                document.getElementById('mean6').innerHTML=calculateMean(Q6.reduce(add, 0), Q6.length).toFixed(2);
                                document.getElementById('mean6').style.color='#FF0000';
                            }else{
                                document.getElementById('mean6').innerHTML=calculateMean(Q6.reduce(add, 0), Q6.length).toFixed(2);
                            }
                            if (calculateMean(Q7.reduce(add, 0), Q7.length)<4){
                                document.getElementById('mean7').innerHTML=calculateMean(Q7.reduce(add, 0), Q7.length).toFixed(2);
                                document.getElementById('mean7').style.color='#FF0000';
                            }else{
                                document.getElementById('mean7').innerHTML=calculateMean(Q7.reduce(add, 0), Q7.length).toFixed(2);
                            }
                            if (calculateMean(Q8.reduce(add, 0), Q8.length)<4){
                                document.getElementById('mean8').innerHTML=calculateMean(Q8.reduce(add, 0), Q8.length).toFixed(2);
                                document.getElementById('mean8').style.color='#FF0000';
                            }else{
                                document.getElementById('mean8').innerHTML=calculateMean(Q8.reduce(add, 0), Q8.length).toFixed(2);
                            }
                            if (calculateMean(Q9.reduce(add, 0), Q9.length)<4){
                                document.getElementById('mean9').innerHTML=calculateMean(Q9.reduce(add, 0), Q9.length).toFixed(2);
                                document.getElementById('mean9').style.color='#FF0000';
                            }else{
                                document.getElementById('mean9').innerHTML=calculateMean(Q9.reduce(add, 0), Q9.length).toFixed(2);
                            }
                            if (calculateMean(Q10.reduce(add, 0), Q10.length)<4){
                                document.getElementById('mean10').innerHTML=calculateMean(Q10.reduce(add, 0), Q10.length).toFixed(2);
                                document.getElementById('mean10').style.color='#FF0000';
                            }else{
                                document.getElementById('mean10').innerHTML=calculateMean(Q10.reduce(add, 0), Q10.length).toFixed(2);
                            }
                            if (calculateMean(Q11.reduce(add, 0), Q11.length)<4){
                                document.getElementById('mean11').innerHTML=calculateMean(Q11.reduce(add, 0), Q11.length).toFixed(2);
                                document.getElementById('mean11').style.color='#FF0000';
                            }else{
                                document.getElementById('mean11').innerHTML=calculateMean(Q11.reduce(add, 0), Q11.length).toFixed(2);
                            }
                            if (calculateMean(Q12.reduce(add, 0), Q12.length)<4){
                                document.getElementById('mean12').innerHTML=calculateMean(Q12.reduce(add, 0), Q12.length).toFixed(2);
                                document.getElementById('mean12').style.color='#FF0000';
                            }else{
                                document.getElementById('mean12').innerHTML=calculateMean(Q12.reduce(add, 0), Q12.length).toFixed(2);
                            }
                            if (calculateMean(Q13.reduce(add, 0), Q13.length)<4){
                                document.getElementById('mean13').innerHTML=calculateMean(Q13.reduce(add, 0), Q13.length).toFixed(2);
                                document.getElementById('mean13').style.color='#FF0000';
                            }else{
                                document.getElementById('mean13').innerHTML=calculateMean(Q13.reduce(add, 0), Q13.length).toFixed(2);
                            }
                            if (calculateMean(Q14.reduce(add, 0), Q14.length)<4){
                                document.getElementById('mean14').innerHTML=calculateMean(Q14.reduce(add, 0), Q14.length).toFixed(2);
                                document.getElementById('mean14').style.color='#FF0000';
                            }else{
                                document.getElementById('mean14').innerHTML=calculateMean(Q14.reduce(add, 0), Q14.length).toFixed(2);
                            }
                            if (calculateMean(Q15.reduce(add, 0), Q15.length)<4){
                                document.getElementById('mean15').innerHTML=calculateMean(Q15.reduce(add, 0), Q15.length).toFixed(2);
                                document.getElementById('mean15').style.color='#FF0000';
                            }else{
                                document.getElementById('mean15').innerHTML=calculateMean(Q15.reduce(add, 0), Q15.length).toFixed(2);
                            }
                            if (calculateMean(Q16.reduce(add, 0), Q16.length)<4){
                                document.getElementById('mean16').innerHTML=calculateMean(Q16.reduce(add, 0), Q16.length).toFixed(2);
                                document.getElementById('mean16').style.color='#FF0000';
                            }else{
                                document.getElementById('mean16').innerHTML=calculateMean(Q16.reduce(add, 0), Q16.length).toFixed(2);
                            }
                            if (calculateMean(Q17.reduce(add, 0), Q17.length)<4){
                                document.getElementById('mean17').innerHTML=calculateMean(Q17.reduce(add, 0), Q17.length).toFixed(2);
                                document.getElementById('mean17').style.color='#FF0000';
                            }else{
                                document.getElementById('mean17').innerHTML=calculateMean(Q17.reduce(add, 0), Q17.length).toFixed(2);
                            }
                            if (calculateMean(Q18.reduce(add, 0), Q18.length)<4){
                                document.getElementById('mean18').innerHTML=calculateMean(Q18.reduce(add, 0), Q18.length).toFixed(2);
                                document.getElementById('mean18').style.color='#FF0000';
                            }else{
                                document.getElementById('mean18').innerHTML=calculateMean(Q18.reduce(add, 0), Q18.length).toFixed(2);
                            }
                            if (calculateMean(Q19.reduce(add, 0), Q19.length)<4){
                                document.getElementById('mean19').innerHTML=calculateMean(Q19.reduce(add, 0), Q19.length).toFixed(2);
                                document.getElementById('mean19').style.color='#FF0000';
                            }else{
                                document.getElementById('mean19').innerHTML=calculateMean(Q19.reduce(add, 0), Q19.length).toFixed(2);
                            }
                            if (calculateMean(overall.reduce(add, 0), overall.length)<4){
                                document.getElementById('overall').innerHTML=calculateMean(overall.reduce(add, 0), overall.length).toFixed(2);
                                document.getElementById('overall').style.color='#FF0000';
                            }else{
                                document.getElementById('overall').innerHTML=calculateMean(overall.reduce(add, 0), overall.length).toFixed(2);
                            }
                            //  document.getElementById('btnPrint').disabled=false;
                            
                        }, 10000);
                            });     
                        });
                    });
                });
            });
        //college name onclick button
        var collegeRef=database.ref('college/'+collegeCode);
        collegeRef.on('value', snap=>{
            document.getElementById('responsesSelectedCollege').innerHTML= '<h4>' + snap.child('college_name').val() + '</h4>';
       
        });
        //calculate mean
        function calculateMean(a, b){
            return a/b;
        }
        //addition of mean per question
        function add(x, y) {
        return x+y;
        }
    }
    
    function collegeMean(collegeCode){
        var overall=[];
        // var meanHolder;
        courseRef.orderByChild('college_code').equalTo(collegeCode).on('value', function(element){
                    element.forEach(function(courseTitle){
                        courseCodeRef.orderByChild('course_title').equalTo(courseTitle.key).on('value', function(codeSnap){
                            codeSnap.forEach(function(code){
                                resultsRef.child('/'+code.key).on('value', function(resultSnap){
                                    resultSnap.forEach(function(studentSnap){
                                        studentSnap.forEach(function(snap){
                                            resultsRef.child('/'+code.key+'/'+studentSnap.key+'/'+snap.key).on('value', function(data){
                                                if(Number.isInteger(snap.val())){
                                                overall.push(snap.val());
                                                }
                                                });
                                            });
                                        });
                                        CCEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
                                        console.log("HEY: "+CCEmean);
                                    });
                                });
                            });
                        });
                    });

        function calculateMean(a, b){
            return a/b;
        }
        //addition of mean per question
        function add(x, y) {
        return x+y;
        }
        
        setTimeout(() => {
            CCEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }else if(collegeCode===10){
            // CEEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===11){
            // CBAEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===12){
            // CAFAEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===13){
                
            // CAEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===14){
                
            // CCJEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===15){
                
            // CTEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===16){
                
            // CHEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===17){
                
            // CHSEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
            // else if(collegeCode===18){
                
            // CASEmean=parseFloat(calculateMean(overall.reduce(add, 0), overall.length).toFixed(2));
            // }
        }, 8000);
    }


/***** FACULTY *****/
function reportsFaculty(collegeCode){
    var facultyArray=[], categoryArray=[], courseFacultyArray=[];
    var queCount=0;
    // assessment_result course code
    // get faculty code
    // if college_code of faculty code is equal to collegeCode, 
    // get mean per question

    facultyRef.on('value', snap=>{
        snap.forEach(faculty=>{
            if(faculty.child('college_code').val()==collegeCode){
                facultyArray.push({code: faculty.key, name: faculty.child('faculty_name').val()}); // #1 push all faculty under selected college
            }
        });

        categoryRef.orderByKey().on('value', snap=>{
            snap.forEach(cat=>{
                // #2 push category to array
                categoryArray.push({id: cat.key, title: cat.child('category_title').val()}); // id, title
            });

            // #3 create TABLE HEADER
            var tr=document.createElement('tr');
            var thItem=document.createElement('th');
            tr.appendChild(thItem);
            tr.setAttribute('class', 'text-center');
            var item=document.createTextNode("ITEM");
            thItem.appendChild(item);

            facultyArray.forEach(fac=>{
                // #3 append all faculty members on header
                var thProf=document.createElement('th');
                tr.appendChild(thProf);
                var txt=document.createTextNode(fac.name+'\n('+fac.code+')');
                thProf.appendChild(txt);
                thProf.setAttribute('class', 'p-3');
                document.getElementById('facultyMeanTable').appendChild(tr);
            });
    
            categoryArray.forEach(cat=>{
                var trCat=document.createElement('tr');
                var thCat=document.createElement('th');
                trCat.appendChild(thCat);
                var txt=document.createTextNode(cat.title);
                thCat.appendChild(txt);
                thCat.setAttribute('class', 'pl-2 py-1');

                for(var i=0; i<facultyArray.length; i++){
                    var emptyTd=document.createElement('td');
                    trCat.appendChild(emptyTd);
                }

                document.getElementById('facultyMeanTable').appendChild(trCat); // load Cat to html

                var qryQ=questionRef.orderByChild('category_id').equalTo(cat.id);
                qryQ.on('value', snap=>{
                    snap.forEach(q=>{
                        var trQue=document.createElement('tr');
                        var tdQue=document.createElement('td');
                        trQue.appendChild(tdQue);
                        var txt=document.createTextNode((++queCount) + '. ' + q.child('question_title').val());
                        tdQue.appendChild(txt);
                        tdQue.setAttribute('class', 'pl-3 py-1');

                        //////////////////////////////document.getElementById('facultyMeanTable').appendChild(trQue); // load Que to html

                        facultyArray.forEach(fac=>{
                            var qryCourse=courseCodeRef.orderByChild('faculty_code').equalTo(fac.code);
                            qryCourse.on('value', snap=>{
                                snap.forEach(ccode=>{
                                    resultsRef.child(ccode.key).on('value', snap=>{
                                        snap.forEach(data=>{
                                            var questionArray=[];
                                            // for(var x=1; x<=numOfQuestions; x++){
                                                // questionArray.push(data.child('Q'+x).val()); 
                                            // }
                                            // var td=document.createElement('td');
                                            // var mean=document.createTextNode(calculateMean());
                                            // console.log('Question: '+ q.child('question_title').val() +"Faculty: "+fac.name+ ' Course: '+ ccode.key);
                                            // console.log(++co + ' ' +data.child('Q2').val());
                                        });
                                    });
                                });
                            });
                        });                        
                    });
                }); // END OF QUESTIONS
            });
        });



        // resultsRef.on('value', snap=>{
        //     snap.forEach(code=>{
        //         courseCodeRef.child(code.key).on('value', ccode=>{
        //             console.log('ASSESSMENT');
        //             // if(){
        //                 // alert("000: "+ccode.child('faculty_code').val()+ " " +facultyArray.find(e=>e.code==ccode.child('faculty_code').val()) );
        //             // }
        //         });
        //     });
        // });
    });
//NOTE: Just specify course code, use forEach, and data.child('Q1').val() to get specific item

    // resultsRef.child('0278').on('value', datasnap=>{
    //     datasnap.forEach(data=>{
    //         console.log(data.child('Q1').val() + " " + data.child('Q2').val() + " " + data.child('Q3').val()+ " " + data.child('Q10').val())
    //     });
    // });
    // resultsRef.on('value', snap=>{
    //     snap.forEach(resultCodeSnap=>{ //assessment_result course codes
    //         courseCodeRef.child(resultCodeSnap.key).on('value', codeSnap=>{
    //             if(codeSnap.child('college_code').val()===collegeCode){ // if course code is under selected college...
    //                 courseCodeArray.push({code: codeSnap.key, title: codeSnap.child('course_title')}); // push course code, title to array as object
    //                 facultyRef.child(codeSnap.child('faculty_code').val()).on('value', facSnap=>{ // get name of professor of each course code
    //                     facultyArray.push(facSnap.child('faculty_name').val());
    //                 });
    //             }
    //         });
    //     });
    // });
    // var queryFaculty=facultyRef.orderByChild('college_code').equalTo(collegeCode);
    // queryFaculty.on('value', facultySnap=>{
    //     facultySnap.forEach(data=>{
    //         facultyArray.push({code: data.key, name: data.child('faculty_name').val()});
    //     });
    // });

    /**************************************** */
    // categoryRef.on('child_added', catSnap=>{
    //     categoryArray.push({code: catSnap.key, title: catSnap.child('category_title').val()});
    // });
/****************************************** */
    
/******************************************
    setTimeout(() => {
        var trProf=document.createElement('tr'); //FIRST ROW INITIALIZATION (PROFESSORS)
        var thItem=document.createElement('th');
        thItem.setAttribute('rowspan', '2');
        trProf.appendChild(thItem);
        trProf.setAttribute('class', 'text-center');
        var item=document.createTextNode("ITEM");
        thItem.appendChild(item);

        var trCode=document.createElement('tr'); //SECOND ROW INITIALIZATION (COURSE CODES)

        facultyArray.forEach(e=>{
            var colspan=0;
            var thProf=document.createElement('th');
            trProf.appendChild(thProf);
            var txt=document.createTextNode(e);
            thProf.appendChild(txt);
            thProf.setAttribute('class', 'p-3');
            document.getElementById('facultyMeanTable').appendChild(trProf);
            console.log('Reading Faculty array');
            courseCodeRef.on('child_added', courseSnap=>{
                console.log('node.js');
                // colspan++;
                // thProf.setAttribute('colspan', colspan);
                // var tdCode=document.createElement('td');
                // tdCode.setAttribute('class', 'px-3');
                // trCode.appendChild(tdCode);
                // trCode.setAttribute('class', 'text-center');
                // var txt2=document.createTextNode(courseSnap.key);
                // tdCode.appendChild(txt2);
                // document.getElementById('facultyMeanTable').appendChild(trCode);

                // courseCodeArray.push(courseSnap.key);
            });
        });
    }, 6000); 
    ********************************************/
//     setTimeout(() => {
//         var count=0;
//         categoryArray.forEach(c=>{            
//             questionRef.orderByChild('category_id').equalTo(c.code).on('child_added', queSnap=>{
//                 var trq=document.createElement('tr');
//                 var tdq=document.createElement('td');
//                 var que=document.createTextNode(++count +". "+queSnap.child('question_title').val());
//                 tdq.setAttribute('class', 'p-3');
//                 trq.appendChild(tdq);
//                 tdq.appendChild(que);
//                 document.getElementById('facultyMeanTable').appendChild(trq);

//                 // courseCodeArray.forEach(courseCode=>{
//                     resultsRef.on('value', csnap=>{
//                         csnap.forEach(courseSnap=>{
//                             courseSnap.forEach(studentSnap=>{
//                                 studentSnap.forEach(dataSnap=>{
//                                     resultsRef.child(courseSnap.key+"/"+studentSnap.key+"/"+dataSnap.key).on('child_added', result=>{
//                                         console.log("HELLO: "+result.val());
//                                     });
//                                 });
//                             });
//                         });
//                     });
//                 // });
//                 var tdm=document.createElement('td');

//                 // var meanPerQ=document.createTextNode();
//             });
//         });
//         }, 4000);
    

//     var collegeRef=database.ref('college/'+collegeCode);
//     collegeRef.on('value', snap=>{
//         document.getElementById('responsesSelectedCollege').innerHTML= '<h4>' + snap.child('college_name').val() + '</h4>';
//     });
//         // var tr=document.createElement('tr');
//         // var td=document.createElement('td');
//         // var colspan=0;
//         // // facultyArray.forEach(codeData=>{
//         //     tr.appendChild(td);
//         //     var txt = document.createTextNode(codeData);
//         //     td.appendChild(txt);
//         //     // document.getElementById('facultyMeanTable').appendChild(td);
//         // // });
        
//         // // facultyArray.forEach(facultyData=>{
//         //     var td=document.createElement('td');
//         //     tr.appendChild(td);
//         //     var txt = document.createTextNode(facultyData);
//         //     td.appendChild(txt);
//         //     // document.getElementById('facultyMeanTable').appendChild(tr);
            
//         // // });
// }

// //Reports-Comments
// function reportsComments(collegeCode){
//     var good=0, bad=0;
//     var comment=[], sentence=[], wordArray=[], returnArr = [], posArr=[], negArr=[];
    
//         //append to header
        
//         courseRef.orderByChild('college_code').equalTo(collegeCode).on('value', function(element){
                    
//                     element.forEach(function(courseTitle){
                    
//                         courseCodeRef.orderByChild('course_title').equalTo(courseTitle.key).on('value', function(codeSnap){
                            
//                             codeSnap.forEach(function(code){
                                    
//                                     $('#myTable').find('#code').append('<th>'+code.key+'</th>');
                                    
//                                     resultsRef.child('/'+code.key).on('value', function(resultSnap){
                                
//                                                 resultSnap.forEach(function(studentSnap){
                                                    
//                                                     studentSnap.forEach(function(snap){
                                                        
//                                                         resultsRef.child('/'+code.key+'/'+studentSnap.key+'/'+snap.key).on('value', function(data){
                                                            
//                                                             if (snap.key==='comment'){
//                                                                 comment.push(data.val());
                                                    
//                                                             }
//                                                         });	
//                                                     });
//                                                 });	
//                                             });
                                
//                                         });	
//                                     });
//                                 });	
//                             });
                        
//                 setTimeout(() => {
                    
//                     // sentence=[], wordArray=[];
    
                    
//                                 var classifierRefPos=database.ref('TextClassifier/positive');
//                                     classifierRefPos.once('value', function(snapshot) {
                                        
//                                         snapshot.forEach(function(data) {	
//                                             posArr.push(data.key);
                                            
//                                     });
//                                 });
                                
//                             var classifierRefNeg=database.ref('TextClassifier/negative');
//                                     classifierRefNeg.once('value', function(snapshot) {
//                                         snapshot.forEach(function(data) {
//                                             negArr.push(data.key);
                                            
//                                     });
//                                 });
                                
//                     setTimeout(() => {
                        
//                     for(var x=0; x < comment.length; x++){
                        
//                         sentence=comment[x];
//                         wordArray=sentence.split(' ');
                        
                        
//                                     good=0, bad=0;
//                                     wordArray.forEach(function(currentValue){
                                        
//                                         if (posArr.includes(currentValue)){
//                                             good++;
                                            
//                                         }else if (negArr.includes(currentValue)){
//                                             bad++;
//                                         }
                        
//                                     });	
                                    
//                                     if(bad > good){
//                                             $('#myTable').find('#comment').append('<tr><td>'+"<p>Negative: </p>"+sentence+'</td></tr>');
//                                     }else{
//                                             $('#myTable').find('#comment').append('<tr><td>'+"<p>Positive: </p>"+sentence+'</td></tr>');
//                                     }
//                     }                   
//                 }, 5000);	
//                  }, 10000);
                                                    
    
        //college name onclick button
    var collegeRef=database.ref('college/'+collegeCode);
    collegeRef.on('value', snap=>{
        document.getElementById('responsesSelectedCollege').innerHTML= '<h4>' + snap.child('college_name').val() + '</h4>';
    });
        
} //end of reportsFaculty()
    


function newTextC(x){
    document.getElementById("hiddenUpdateCategory"+x).value=document.getElementById("catTitle"+x).value;
}

function newTextQ(x){
  document.getElementById("hiddenUpdateQuestion"+x).value=document.getElementById("queTitle"+x).value;
}

function showSaveCategory(x){
  document.getElementById("updateCategory"+x).style.display="block";
  document.getElementById("deleteCategory"+x).style.display="none";
}
function hideSaveCategory(x){
  document.getElementById("updateCategory"+x).style.display="none";
  document.getElementById("deleteCategory"+x).style.display="block";
}
function showSaveQuestion(x){
  document.getElementById("updateQuestion"+x).style.display="block";
  document.getElementById("deleteQuestion"+x).style.display="none";
}
function hideSaveQuestion(x){
  document.getElementById("updateQuestion"+x).style.display="none";
  document.getElementById("deleteQuestion"+x).style.display="block";
}

function addNewCategory(){
    var newCat=document.getElementById("newCategory").value;
    var qryCategory=categoryRef.push().set({ //PUSH VALUES INTO DATABASE WITH UNIQUE KEY
        category_title: newCat
    });
    location.reload();
}

function removeCategory(id){
    if(confirm('All questions under this category will also be deleted. Are you sure you want to delete this category?')){
        var qryRemove=questionRef.orderByChild('category_id').equalTo(id);
        qryRemove.on('child_added', snapshot=>{
            questionRef.child(snapshot.key).remove();
        });
        categoryRef.child(id).remove();
        setTimeout("location.reload(true);",1000);
    }
}

function updateCategory(id){
    var categoryRefId=database.ref('category/'+id);
    var updateCategoryTitle=document.getElementById('hiddenUpdateCategory'+id).value;
    categoryRefId.update({
        category_title: updateCategoryTitle
    });
    location.reload();
}

function addNewQuestion(id){
    var newQue=document.getElementById("newQuestion"+id).value;
    var idCat=id;
    
    var qryQuestion=questionRef.push().set({
        question_title: newQue,
        category_id: idCat
    });
    location.reload();
}

function removeQuestion(id){
    if(confirm('Are you sure you want to delete this question?')){
        questionRef.child(id).remove();
        location.reload();
    }
}

function updateQuestion(id){
    var questionRefId=database.ref('question/'+id);
    var updateQuestionTitle=document.getElementById('hiddenUpdateQuestion'+id).value;
    questionRefId.update({
        question_title: updateQuestionTitle
    });
    location.reload();
}

/*** USERS MODULE ***/
function addUser(){
    var addFullname=document.getElementById("fullname").value;
    var addUsername=document.getElementById("username").value.toLowerCase();
    var addPassword=document.getElementById("password").value;
    var repassword=document.getElementById("rePassword").value;

    if($.trim(addFullname).length===0||$.trim(addUsername).length===0||$.trim(addPassword).length===0||$.trim(repassword).length===0){
        document.getElementById('errorAdd').innerHTML='<p class="alert alert-danger mb-2" role="alert">Please fill in all fields.</p>';
    }else{
        var qryUsername=adminRef.orderByChild('username').equalTo(addUsername);

        qryUsername.on('value', snap=>{ //CHECK ALL username IN THE DATABASE
            if(snap.val()!==null){ // USERNAME EXISTS
                document.getElementById('errorAdd').innerHTML='<p class="alert alert-danger mt-2">Username already exists.</p>';
            }else{
                if(addPassword!==repassword){
                    document.getElementById('errorAdd').innerHTML='<p class="alert alert-danger mt-2">Password does not match the confirm password.</p>';
                }else{
                    var newUser=adminRef.push().set({ //PUSH VALUES INTO DATABASE WITH UNIQUE KEY
                        admin_name: addFullname,
                        username: addUsername,
                        password: addPassword,
                        type: 'Admin'
                    });
                    $('#addUser').modal('hide');
                    $('#alertUserAdded').modal('show');
                    setTimeout("location.reload(true);",2000);
                }
            }
        });
    }
}

function removeUser(idRemove){
    adminRef.child(idRemove).remove();
    $('#alertUserRemoved').modal('show');
    setTimeout("location.reload(true);",2000);
}

/*** LOG OUT ***/
function logout(){
    // sessionStorage.clear();
    var conf=confirm('Are you sure you want to log out?');
    if(conf==true){
        window.location.replace("login.html");
    }
}