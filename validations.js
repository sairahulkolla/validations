const emailFilter =  /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
const charFilter = /^[a-zA-Z\s]+$/;
const pwdvalid=/^[a-zA-Z0-9]+$/;
const alphanum=/^[a-zA-Z0-9\s]+/;
const number_f=/^[0-9]+$/;

function alphanum_validate(val,minLen,maxLen,fName,errId){
	   let errs = '';
       val = val.toString();
	    if(val==''){errs ='Please enter '+fName;}
	    else if(val.length<minLen){errs = 'Please enter minimum '+minLen+' characters';}
		else if(maxLen>0 && val.length>maxLen){errs = 'Please enter '+maxLen+' characters';}
		else if(!alphanum.test(val)){errs = 'Please enter Alphanumeric only';}
		else{errs='';}
		return errs;
	}

function string_validate(val,minLen,maxLen,fName,errId){
    let errs = '';
    val = val.toString();
    if(val==''){errs ='Please enter '+fName;}
    else if(val.length<minLen){errs = 'Please enter minimum '+minLen+' characters';}
    else if(maxLen>0 && val.length>maxLen){errs = 'Please enter '+maxLen+' characters';}
    else if(!charFilter.test(val)){errs = 'Please enter alphabets only';}
    return errs;
}
function varchar_validate_dd(val,minLen,maxLen,fName,errId){
    let errs = '';
    val = val.toString();
    if(val==''){errs = 'Please select '+fName;}
    else if(val.length<minLen){errs = 'Please select minimum '+minLen+' characters';}
    else if(maxLen>0 && val.length>maxLen){errs = 'Please select '+maxLen+' characters';}
    return errs;
}
function varchar_validate(val,minLen,maxLen,fName,errId){
    let errs = '';
    val = val.toString();
    if(val==''){errs = 'Please enter '+fName;}
    else if(val.length<minLen){errs = 'Please enter minimum '+minLen+' characters';}
    else if(maxLen>0 && val.length>maxLen){errs = 'Please enter '+maxLen+' characters';}
    return errs;
}

function email_validate(val,minLen,maxLen,fName,errId){
    let errs = '';
    val = val.toString();
    if(val==''){errs = 'Please enter '+fName;}
    else if(val.length<minLen){errs = 'Please enter minimum '+minLen+' characters';}
    else if(maxLen>0 && val.length>maxLen){errs = 'Please enter '+maxLen+' characters';}
    else if(!emailFilter.test(val)){errs = 'Please enter valid email';}
    return errs;
}

function int_validate(val,minLen,maxLen,fName,errId){
    let errs = '';
    val = val.toString();
    if(val==''){errs ='Please enter '+fName;}
    else if(val.length<minLen){errs = 'Please enter minimum '+minLen+' digits';}
    else if(maxLen>0 && val.length>maxLen){errs = 'Please enter '+maxLen+' digits';}
    //else if(isNaN(val)){errs = 'Please enter numbers only';}
    else if(!number_f.test(val)){errs = 'Please enter numbers only';}
    return errs;
}

function url_validate(val,minLen,maxLen,fName,errId){
    var errs = '';
    val = val.toString();
    if(val==''){errs ='Please enter '+fName;}
    return errs;
}

function file_validate(val,minLen,maxLen,fName,errId,allowed){
    let errs = '';
    let ext = val.split('.').pop().toLowerCase();
    val = val.toString();
    if(val==''){errs ='Please Upload '+fName;}
    if(allowed.includes(ext)){errs ='Invalid file format';}
    return errs;
}




// $("#reg_form").on('click',function(){
    
// })

