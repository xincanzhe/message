function time(){
        var t=50;//设定跳转的时间 
        setInterval('refer()',100); //启动1秒定时 
        function refer(){  
            if(t==0){ 
                location='../login.html'; //#设定跳转的链接地址 
            } 
            var y=Math.ceil(t/10)
            document.getElementById('show').innerHTML=''+y+'秒后跳转到登录页面'; // 显示倒计时 
            t--; // 计数器递减  
        } 
    }