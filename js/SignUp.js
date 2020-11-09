function cllss(reg){
    var user=document.getElementById("username").value;//获取用户名；
    var pass=document.getElementById("password").value;
    var rpass=document.getElementById("rpassword").value;
    var email=document.getElementById("email").value;
    var tel=document.getElementById("tel").value;
//获取span标签的内容
    var muser=document.getElementById("muser").innerText;
    var mpass=document.getElementById("mpass").innerText;
    var mrpass=document.getElementById("mrpass").innerText;
    var memail=document.getElementById("memail").innerText;
    var mtel=document.getElementById("mtel").innerText;
    if(reg=="username"||reg=="all"){
        if(/^[A-Za-z]\w{3,17}$/.test(user)){//控制用户名为字母开头4-16位；
            document.getElementById("muser").innerText="√";
        }
        else if(user==""){
            document.getElementById("mrpass").innerText="*";
        }
        else{document.getElementById("muser").innerText="字母开头,用户名4-16位组成";
            return false;
        }
    }
    if(reg=="upass"||reg=="all")//密码进行验证，控制密码由4~12位字符组成
      {
          
        
            if(/^[a-zA-Z0-9]\w{5,12}$/.test(pass)){
                document.getElementById("mpass").innerText="√";
            }
			else {document.getElementById("mpass").innerText="密码字母开头，6-12位组成"; return false;}
      }
    if(reg=="rpass"||reg=="all")//确认密码进行验证，控制密码由4~12位字符组成，并且两次密码要一致
      {
        if(pass==rpass){
            document.getElementById("mrpass").innerText="√";
        }
        else if(rpass==""){
            document.getElementById("mrpass").innerText="*";
        }
        if(pass!=rpass)
        {
            document.getElementById("mrpass").innerText="两次密码输入不一致";
            return false
        }
      }
    if(reg=="tel"||reg=="all")//手机号码进行验证，控制手机号码以1开头，第二位可以,是3、4、5、8的11位数字
      {
        if(/^1[34578]\d{9}$/.test(tel)){
            
        }
        if(/^1[34578]\d{9}$/.test(tel))
        {
            document.getElementById("mtel").innerText="√";
        }
        else
        {      
            document.getElementById("mtel").innerText="电话格式错误";
          return false;
        }
      }
    if(reg=="uemail"||reg=="all")//电子邮箱email验证
      {
        if(/^\w+@\w+\.\w+$/.test(email))
        {
            document.getElementById("memail").innerText='√';
        }
        else
        {
            document.getElementById("memail").innerText="邮箱格式错误";
          return false;
        }
      }
    return true;
  }