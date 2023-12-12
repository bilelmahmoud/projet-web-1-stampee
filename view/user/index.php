{{ include('header.php', {title: 'membre List'}) }}
<body>
    <div class="container">
       
        <table>
            <tr>
                <th>Username</th>
                <th>Privilege</th>
                <th>supprime user</th>


            </tr>
            {% for user in users %}
                <tr>
                    <td>{{ user.username }}</a></td>
                    <td>{{ user.privilege }}</td>
                    <td>
                        <form action="{{path}}user/destroy" method="post">
                            <input type="hidden" name="id" value="{{user.id}}">
                            <input type="submit" value="supprimer">
                        </form>
                    </td>

                </tr>
            {% endfor %}
        </table>
        <br><br>
        <a href="{{path}}user/create" class="btn">Ajouter</a>
    </div>
    
</body>
</html>

<!-- {{ include('footer.php', {title: 'Home'}) }} -->