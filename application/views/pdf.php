<table>
    <?php foreach ($records as $record): ?>
    <tr>
        <td>
            <?php if (strlen ($record->PhotoOfItem) && '0' !== $record->PhotoOfItem): ?>
            <img src="<?= $record->PhotoOfItem ?>" width="200" height="200">
            <?php endif ?>
        </td>
        <td>
                <ul style="list-style-type: none">
                    <?php foreach (array ('AssetCode', 'Name', 'Model', 'InvoiceNumber', 'Category', 'DateAcquired', 'DateDisposed', 'DisposalMethod', 'Location', 'Active', 'Notes') as $field) : ?>
                    <li><b><?= implode(' ', preg_split('/(?=[A-Z])/', $field)) ?></b> <?= $record->$field ?></li>
                    <?php endforeach ?>
                </ul>
        </td>
        <td>
            <?php if (strlen ($record->PhotoOfSerialNumber) && '0' !== $record->PhotoOfSerialNumber): ?>
            <img src="<?= $record->PhotoOfSerialNumber ?>" width="200" height="200">
            <?php endif ?>
        </td>
    </tr>
    <?php endforeach ?>
</table>