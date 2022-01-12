<?php require_once 'template/template_header.php' ?>
<section id="form">
    <div class="container">
        <?php if (isset($_GET['success_register'])) { ?>
            <div class="row text-center">
                Вы успешно зарегистрированы
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <h2>Авторизация</h2>
                    <form action="/auth" method="post">
                        <input type="email" placeholder="Почта" name="email" required/>
                        <input type="password" placeholder="Пароль" name="password" required/>
                        <button type="submit" class="btn btn-default">Войти</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-1">
                <h2 class="or">Или</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <h2>Регистрация</h2>
                    <form action="/register" method="post">
                        <input type="text" placeholder="Имя" name="name" required/>
                        <input type="email" placeholder="Почта" name="email" required/>
                        <input type="password" placeholder="Пароль" name="password" required/>
                        <button type="submit" class="btn btn-default">Зарегестрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'template/template_footer.php' ?>
