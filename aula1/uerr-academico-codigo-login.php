<?php 

if(isset($_POST['username'])){
    echo $_POST['username'];
}
echo '<br>';
   
if(isset($_POST['password'])){
    echo $_POST['password'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="title" content="Aluno" />
        <title>Aluno - Registro Acadêmico</title>
        <meta property="og:title" content="Aluno">
        <meta property="og:site_name" content="Registro Acadêmico">
        <script type="text/javascript" src="/aluno/js/jquery.min.js?static"></script>
        <script type="text/javascript" src="/aluno/js/jquery.placeholder.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/jquery.mask.min.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/select2.full.min.js?v2"></script>
        <script type="text/javascript" src="/aluno/js/select2.multi-checkboxes.min.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/jquery.filter.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/jquery-ui.min.datepicker.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/datepicker_pt_br.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/tinymce/tinymce.min.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/jquery.colorbox-min.js?v=20201026090016"></script>
        <script type="text/javascript" src="/aluno/js/functions.min.js?v=20201026090016"></script>
        <link rel="apple-touch-icon" sizes="180x180" href="/images/icons/apple-touch-icon.png?v=20201026090016">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/icons/favicon-32x32.png?v=20201026090016">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/icons/favicon-16x16.png?v=20201026090016">
        <link rel="manifest" href="/aluno/app_manifest.webmanifest?v=20201026090016">
        <link rel="mask-icon" href="/images/icons/safari-pinned-tab.svg?v=20201026090016" color="#568f56">
        <link rel="shortcut icon" href="/images/icons/favicon.ico?v=20201026090016">
        <meta name="apple-mobile-web-app-title" content="Minha UERR">
        <meta name="application-name" content="Minha UERR">
        <meta name="msapplication-TileColor" content="#568f56">
        <meta name="theme-color" content="#568f56">
        <link rel="stylesheet" type="text/css" media="screen" href="/admin/css/scss/login.css?v=20201026090016" />
        <link rel="stylesheet" type="text/css" media="screen" href="/css/fontawesome-all.min.css?static" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--[if lte IE 9]>
              <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
    </head>

    <body>

        <section id="session">
            <header>
                <a href="/" title="Voltar para a página inicial"><img src="/aluno/images/uerr-logo-horiz-color.svg" alt="UERR"></a>
            </header>

            <h1>Login</h1>


            <form action="uerr-academico-codigo-login.php" method="post">
                <div>
                    <label for="signin_username">Usuário:</label>            </div>
                <div>
                    <input type="text" name="username" id="signin_username" />    </div>
                <div>
                    <label for="signin_password">Senha:</label>            </div>
                <div>
                    <input type="password" name="password" id="signin_password" />    </div>
                <div>
                    <input type="hidden" name="signin[_csrf_token]" value="848e3940b09bafc91d7db761d3992220" id="signin__csrf_token" />    </div>
                <input type="submit" value="Entrar" />
                <a href="/aluno/guard/forgot_password">Esqueceu a Senha?</a>

                <div id="spinner" class="botao_facebook">
                    <span class="spinner-icon fas fa-spinner fa-fw fa-spin"></span>
                    <div style="display:none" class="fb-login-button" data-width="" data-size="medium" data-button-type="login_with" data-auto-logout-link="false" data-use-continue-as="false" data-onlogin="fbLoginResponse" data-scope="email,public_profile"></div>
                </div>
            </form>
            <script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '692191297962169',
                        xfbml: true,
                        version: 'v4.0'
                    });
                    FB.AppEvents.logPageView();

                    var finished_rendering = function () {
                        console.log("finished rendering plugins");
                        var spinner = $("#spinner");
                        // spinner.removeAttr("style");
                        spinner.children("span").fadeOut('fast');
                        $(".fb-login-button").fadeIn();
                    }
                    FB.Event.subscribe('xfbml.render', finished_rendering);
                };

                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://connect.facebook.net/pt_BR/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));


                function fbLoginResponse(response) {
                    if (response.authResponse) {
                        token = response.authResponse['accessToken'];
                        console.log(token);
                        FB.api('/me?fields=name,email', function (response) {
                            var http = new XMLHttpRequest();
                            var url = "/aluno/guard/login";
                            var params = "name=" + response.name + "&email=" + response.email + '&type=facebook';
                            http.open("POST", url, true);
                            alert('Aguarde fazendo o login');
                            //Send the proper header information along with the request
                            http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                            http.onreadystatechange = function () { //Call a function when the state changes.
                                if (http.status == 200) {
                                    location.reload();
                                    //                            alert(http.responseText);
                                }
                                if (http.status == 500) {
                                    //                             location.reload();
                                    alert('O nome/email no cadastro do facebook/Uerr devem ser exatamente os mesmos para tal facilidade funcionar');
                                }
                            }
                            http.send(params);

                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }


                function Login() {

                    FB.login(fbLoginResponse, {
                        scope: 'email,publish_actions,user_managed_groups'
                    });

                }

                function processAll() {
                    fbAsyncInit();
                    Login();
                }
            </script>
            <footer>    <p>Você pode verificar se seus dados estão corretos <a href="/validador/checkUser/index" style="text-decoration: underline;color: red;">clicando aqui</a>.</p>
                <p>Caso não consiga acessar, envie um e-mail para:
                    <a href="mailto:registro@uerr.edu.br?subject=Problema%20de%20acesso&body=Nome%20completo%3A%20%0ACurso%3A%20%0AMatr%C3%ADcula%3A%20%0ADescri%C3%A7%C3%A3o%20do%20problema%3A%20" target="_blank">registro@uerr.edu.br</a>. Neste caso, inclua seu nome completo, curso, número de matrícula e uma descrição detalhada do problema.</p>
            </footer>
        </section>
    </body>

</html>
