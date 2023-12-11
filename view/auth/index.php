{{ include('header.php', {title: 'Login'}) }}
<body>
    <div class="container">
        <form class="form-membre" action="{{path}}login/auth" method="post">
              
            <span class="text-danger">{{ errors | raw }}</span>

            <label>adresse Courriel
                <input type="text" name="username" value="{{user.username}}">
            </label>
            <label>Mot de passe
                <input type="password" name="password" value="">
            </label>
            <input type="submit" value="Connecter" class="btn">
        </form>
    </div>
</body>
</html>
