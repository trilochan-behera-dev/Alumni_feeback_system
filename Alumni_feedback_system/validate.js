function validate()
{
var name=document.getElementById("name").value;
var number=document.getElementById("number").value;
var email=document.getElementById("email").value;
var address=document.getElementById("address").value;
var yoj=document.getElementById("yoj").value;
var yop=document.getElementById("yop").value;
var qual=document.getElementById("qual").value;
var cgpa=document.getElementById("cgpa").value;
var deg=document.getElementById("deg").value;
var jobt=document.getElementById("jobt").value;
var comp=document.getElementById("comp").value;
var compl=document.getElementById("compl").value;
var cou=document.getElementById("cou").value;
var uni=document.getElementById("uni").value;

var nameErr = mobileErr = emailErr = addressErr =  qualErr = degErr = yojErr  = yopErr = cgpaErr = jobtErr = compErr = complErr = couErr = uniErr = true;
// Validate name
if(name.trim()== "") {
    document.getElementById("nameErr").innerHTML="** Please enter your name";
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(name) === false) {
        document.getElementById("nameErr").innerHTML="** Please enter a valid name";
    } else {
        document.getElementById("nameErr").innerHTML="";
        nameErr = false;
    }
}
// Validate mobile number
if(number.trim()== "") {
    document.getElementById("mobileErr").innerHTML="**Please enter your mobile number";
} else {
    var regex = /^[1-9]\d{9}$/;
    if(regex.test(number) === false) {
        document.getElementById("mobileErr").innerHTML="** Please enter a valid 10 digit mobile number";
    } else{
        document.getElementById("mobileErr").innerHTML="";
        mobileErr = false;
    }
}

// Validate email address
if(email.trim()== "") {
    document.getElementById("emailErr").innerHTML="** Please enter your email address";
} else {
    // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    if(regex.test(email) === false) {
        document.getElementById("emailErr").innerHTML="** Please enter a valid email address";
    } else{
        document.getElementById("emailErr").innerHTML="";
        emailErr = false;
    }
}

//validate address
if(address.trim()=="")
{
    document.getElementById("addressErr").innerHTML="** Please enter your address";
}
else 
{      
    document.getElementById("addressErr").innerHTML="";
    addressErr = false;
}

// Validate year of joining
if(yoj.trim()== "") {
    document.getElementById("yojErr").innerHTML="**Please enter year of joining";
} else {
    var regex = /^[2]\d{3}$/;
    if(regex.test(yoj) === false) {
        document.getElementById("yojErr").innerHTML="** Please enter a valid year";
    } else{
        document.getElementById("yojErr").innerHTML="";
        yojErr = false;
    }
}

// Validate year of passing
if(yop.trim()== "") {
    document.getElementById("yopErr").innerHTML="**Please enter year of passing";
} else {
    var regex = /^[2]\d{3}$/;
    if(regex.test(yop) === false  ||  yop <= yoj) {
        document.getElementById("yopErr").innerHTML="** Please enter a valid year";
    } else{
        document.getElementById("yopErr").innerHTML="";
        yopErr = false;
    }
}

// Validate qualification
if(qual == "SELECT") {
    document.getElementById("qualErr").innerHTML="** Please select your quaification";
} else {
    document.getElementById("qualErr").innerHTML="";
    qualErr = false;
}

//validate CGPA
if(cgpa.trim()=="" || cgpa >10)
{
    document.getElementById("cgpaErr").innerHTML="** Please enter Valid CGPA";
}
else 
{      
    document.getElementById("cgpaErr").innerHTML="";
    cgpaErr = false;
}



// Validate designation
if(deg == "SE")
	{
		document.getElementById("degErr").innerHTML="** Please select your current Designation";	
}


else if(deg == "J"){
// Validate Jov title
if(jobt.trim()== "") {
    document.getElementById("jobtErr").innerHTML="** Please enter your Job Title";
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(jobt) === false) {
        document.getElementById("jobtErr").innerHTML="** Please enter a valid job";
    } else {
        document.getElementById("jobtErr").innerHTML="";
        jobtErr = false;
    }
}
// Validate company Name
if(comp.trim()== "") {
    document.getElementById("compErr").innerHTML="** Please enter your Company name";
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(comp) === false) {
        document.getElementById("compErr").innerHTML="** Please enter a valid company name";
    } else {
        document.getElementById("compErr").innerHTML="";
        compErr = false;
    }
}
// Validate Company Location
if(compl.trim()== "") {
    document.getElementById("complErr").innerHTML="** Please enter your Comapany Location";
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(compl) === false) {
        document.getElementById("complErr").innerHTML="** Please enter a valid Location";
    } else {
        document.getElementById("complErr").innerHTML="";
        complErr = false;
    }
}
document.getElementById("degErr").innerHTML="";
	degErr = false;
    /*document.getElementById(cou).value="NULL";
    document.getElementById(uni).value="NULL";*/
    cou="NULL";
    uni="NULL";
	}

else if(deg == "S"){
// Validate course name
if(cou.trim()== "") {
    document.getElementById("couErr").innerHTML="** Please enter  Course name";
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(cou) === false) {
        document.getElementById("couErr").innerHTML="** Please enter a valid Course name";
    } else {
        document.getElementById("couErr").innerHTML="";
        couErr = false;
    }
}
// Validate university name
if(uni.trim()== "") {
    document.getElementById("uniErr").innerHTML="** Please enter your University name";
} else {
    var regex = /^[a-zA-Z\s]+$/;                
    if(regex.test(uni) === false) {
        document.getElementById("uniErr").innerHTML="** Please enter a valid University name";
    } else {
        document.getElementById("uniErr").innerHTML="";
        uniErr = false;
    }
}
document.getElementById("degErr").innerHTML="";
	degErr = false;
}

	



if((nameErr || mobileErr || emailErr || addressErr || yojErr || yopErr || qualErr || cgpaErr || degErr ||  (jobtErr || compErr || complErr) && (couErr || uniErr ) == true )) {
    return false;}
else
{
	return true;
}
}
function validatequa(){
   
    var selt = document.getElementById("deg").value;
    var stu = document.getElementById("stu");
    var job = document.getElementById("job");
    if(selt == "S"){
	stu.style.display="block";
	job.style.display="none";
	
}
   if(selt =="J"){
		job.style.display="block";
		stu.style.display="none";

		
	}
	if(selt == "SE"){
		job.style.display="none";
		stu.style.display="none";
	}
}
