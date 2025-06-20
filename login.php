<?php @ob_start();@session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <title>โรงพยาบาลเจาะไอร้อง - โรงพยาบาลที่ก้าวสู่องค์กรแห่งอนาคต</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css1/style.css">

  <script nonce="cdc03ee4-5bff-43e3-bd36-6b1656015f81">try{(function(w,d){!function(j,k,l,m){if(j.zaraz)console.error("zaraz is loaded twice");else{j[l]=j[l]||{};j[l].executed=[];j.zaraz={deferred:[],listeners:[]};j.zaraz._v="5808";j.zaraz._n="cdc03ee4-5bff-43e3-bd36-6b1656015f81";j.zaraz.q=[];j.zaraz._f=function(n){return async function(){var o=Array.prototype.slice.call(arguments);j.zaraz.q.push({m:n,a:o})}};for(const p of["track","set","debug"])j.zaraz[p]=j.zaraz._f(p);j.zaraz.init=()=>{var q=k.getElementsByTagName(m)[0],r=k.createElement(m),s=k.getElementsByTagName("title")[0];s&&(j[l].t=k.getElementsByTagName("title")[0].text);j[l].x=Math.random();j[l].w=j.screen.width;j[l].h=j.screen.height;j[l].j=j.innerHeight;j[l].e=j.innerWidth;j[l].l=j.location.href;j[l].r=k.referrer;j[l].k=j.screen.colorDepth;j[l].n=k.characterSet;j[l].o=(new Date).getTimezoneOffset();if(j.dataLayer)for(const t of Object.entries(Object.entries(dataLayer).reduce(((u,v)=>({...u[1],...v[1]})),{})))zaraz.set(t[0],t[1],{scope:"page"});j[l].q=[];for(;j.zaraz.q.length;){const w=j.zaraz.q.shift();j[l].q.push(w)}r.defer=!0;for(const x of[localStorage,sessionStorage])Object.keys(x||{}).filter((z=>z.startsWith("_zaraz_"))).forEach((y=>{try{j[l]["z_"+y.slice(7)]=JSON.parse(x.getItem(y))}catch{j[l]["z_"+y.slice(7)]=x.getItem(y)}}));r.referrerPolicy="origin";r.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(j[l])));q.parentNode.insertBefore(r,q)};["complete","interactive"].includes(k.readyState)?zaraz.init():j.addEventListener("DOMContentLoaded",zaraz.init)}}(w,d,"zarazData","script");window.zaraz._p=async mP=>new Promise((mQ=>{if(mP){mP.e&&mP.e.forEach((mR=>{try{const mS=d.querySelector("script[nonce]"),mT=mS?.nonce||mS?.getAttribute("nonce"),mU=d.createElement("script");mT&&(mU.nonce=mT);mU.innerHTML=mR;mU.onload=()=>{d.head.removeChild(mU)};d.head.appendChild(mU)}catch(mV){console.error(`Error executing script: ${mR}\n`,mV)}}));Promise.allSettled((mP.f||[]).map((mW=>fetch(mW[0],mW[1]))))}mQ()}));zaraz._p({"e":["(function(w,d){})(window,document)"]});})(window,document)}catch(e){throw fetch("/cdn-cgi/zaraz/t"),e;};</script></head>
  <body>

<?php if($_POST['user'] =='' and $_POST['pass'] ==''){ ?>




  <section class="ftco-section">
    <div class="container">
     
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
          <div class="wrap">
            
            <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">Sign In</h3>
                </div>
                 
              </div>
              <form action="login.php" class="signin-form" method="post"  >
                <div class="form-group mt-3">
                  <input type="text" class="form-control" required name="user">
                  <label class="form-control-placeholder" for="username">Username</label>
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" class="form-control" required  name="pass">
                  <label class="form-control-placeholder" for="password">Password</label>
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary rounded submit px-3">เข้าสู่ระบบ</button>
                </div>
             <?php if($_GET['ac']=='wrong'){?>  <p align="center"><font color="red">ชื่อผู้ใช้หรือรหัผ่านไม่ถูกต้อง</font></p> <?php }?> 
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php }else{ 

if($_POST['user'] =='admin' and $_POST['pass'] =='12345'){ 

$_SESSION["name"] ='admin';

 echo "<meta http-equiv='refresh' content='0;URL=data/dowell.php' />";


}else{

  echo "<meta http-equiv='refresh' content='0;URL=login.php?ac=wrong' />";

}

  }?>
  <script src="css1/jquery.min.js"></script>
  <script src="css1/popper.js"></script>
  <script src="css1/bootstrap.min.js"></script>
  <script src="css1/main.js"></script>

  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8cedf609d8ed894b","serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"version":"2024.8.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>
</html>

