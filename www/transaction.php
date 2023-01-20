<section>
    <form method="POST" action="actions/form_transaction.php">
        <label for="value">Dépot pour :</label>
        <input type="text" id="iban_in" name="iban_in" required>
        <label for="value">Montant :</label>
        <input type="text" id="amount" name="amount" required>
        <select name="currency" id="currency" required>
            <option value="" disabled selected>Devise:</option>
            <option value="EUR" id="eur">€</option>
            <option value="DOLLAR" id="dollar">$</option>
            <option value="YEN" id="yen">¥</option>
            <option value="BITCOIN" id="bitcoin">₿</option>
            <option value="RUBLE" id="ruble">₽</option>
        </select>
        <input type="submit" name="transaction-submit" value="Transaction">
    </form>
    </section>