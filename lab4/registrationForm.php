<?php
require_once 'header.php';
require_once 'registrationLogic.php';
?>

<div class="main py-5">
<div class="col-md-5 mx-auto" id="signUp">
        <form action="" method="POST">
            <h4 style="padding-bottom: 20px">Регистрация</h4>
            <div class="mb-3">
                <label for="input_name" class="form-label">Фамилия Имя Отчество</label>
                <input type="text" class="form-control" name="input_name" pattern="^[а-яА-ЯёЁ]+\s[а-яА-ЯёЁ]+\s?[а-яА-ЯёЁ]+$" required>
            </div>
            <div class="row">
            <div class="col">
                <label for="input_gender" class="form-label">Пол</label>
                <select class="form-select" name="input_gender" pattern="^(Мужской|Женский|Не скажу)$" required>
                    <option>Мужской</option>
                    <option>Женский</option>
                    <option>Не скажу</option>
                </select>
            </div>
            <div class="col">
                <label for="input_birth_date" class="form-label">Дата рождения</label>
                <input type="date" class="form-control" name="input_birth_date" pattern="^[0-3][0-9]\.[0-1][0-9]\.[12][0-9][0-9][0-9]$" required>
            </div>
            <div class="mb-3">
                <label for="input_region" class="form-label" style="padding-top: 20px">Регион</label>
                <select name="input_region" class="form-select" pattern="^([А-Яа-я\s]+)\s+(область|республика|край|автономный округ|город|республика)$" required>
                    <option>Белгородская область</option>
                    <option>Брянская область</option>
                    <option>Московская область</option>
                    <option>Воронежская область</option>
                    <option>Ивановская область</option>
                    <option>Костромская область</option>
                    <option>Волгоградская область</option>
                    <option>Пензенская область</option>
                    <option>Ленинградская область</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="input_phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control" name="input_phone" placeholder="79999999999" pattern="^((\+7|7|8)+([0-9]){10})$" required>
            </div>
            <div class="mb-3">
                <label for="input_vk" class="form-label">Сслыка на профиль ВКонтакте</label>
                <input type="text" class="form-control" name="input_vk" placeholder="https://vk.com/" pattern="https://vk.com/\w{6,}" required>
            </div>
            <div class="mb-3">
                <label for="input_email_signUp" class="form-label">Адрес электронной почты</label>
                <input type="email" class="form-control" name="input_email_signUp" placeholder="name@example.com" pattern="\w+\.*\w+@\w+\.\w+" required>
            </div>
            <div class="mb-3">
                <label for="input_password_singUp" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="input_password_singUp" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W)[A-Za-z\d\W]{6,}$" required> 
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#passwordModal">Требования к паролю</button>

                <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="passwordModalLabel">Требования к паролю</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li>Не менее 6 символов</li>
                                    <li>Прописные латинские буквы</li>
                                    <li>Строчные латинские буквы</li>
                                    <li>Не менее 1 спецсимвола(~!?@#$%^&*_-+...)</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Понял</button>
                            </div>
                        </div>
                    </div>
                </div>

                <label for="confirm_password_singUp" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" name="confirm_password_singUp" required>

            </div>

            <button type="submit" class="btn btn-primary" id="signUp">Регистрация</button>
            <div class="mb-3">
                Уже есть аккаунт? <a href="authorizationForm.php">Авторизоваться</a>
            </div>
        </form>
    </div>  
</div>


<?php
require_once 'footer.html';
?>