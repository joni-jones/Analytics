#Analytics

##Yii project settings

1. Specify `environment` in ``index.php``. If APC PHP extension is available, change ``yii.php``
to ``yiilite.php`` in ``index.php``.

2. Specify site name in ``protected/config/production.php`` array key ``name``.

3. Specify database details in ``protected/config/production.php`` array key ``db``:

    connectionString = '';

    username = '';

    password = '';

4. Specify base url in application config.

5. Specify administrator email:

    params['admin_email'] = '';

6. Specify source and default language:

    language = '';
    sourceLanguage = '';

7. All localization files located in ``protected/messages/language/app.php|sys.php``