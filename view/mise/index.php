{{ include('header.php', {title: 'Mes Mises'}) }}

<h2>Mes Mises</h2>
<table border="1">
    <tr>
        <th>Enchère</th>
        <th>Date de la mise</th>
        <th>Montant de la mise</th>
    </tr>

    {% for mise in misesUtilisateur %}
        <tr>
            <td>{{ mise.enchere_id }}</td>
            <td>{{ mise.mise_date }}</td>
            <td>{{ mise.mise_prix }} $ </td>
        </tr>
    {% endfor %}
</table>
