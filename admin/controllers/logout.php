<?php
session_unset();
session_destroy();

header('Location: /administration/connexion');
exit();