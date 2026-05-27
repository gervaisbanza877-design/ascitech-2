<?php
// On démarre la session UNIQUEMENT si elle n'a pas déjà été lancée ailleurs
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['SCRIPT_NAME']);
$isAccueilPage = $currentPage === 'accueil.php';

function navLinkClass(string $page, string $currentPage): string {
    return $page === $currentPage ? 'active' : '';
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASCITECH | Excellence Scolaire</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600;800&display=swap">
    <link rel="stylesheet" href="style.css/styles.css">
    <?php if (!empty($pageCss)): ?>
        <link rel="stylesheet" href="<?php echo htmlspecialchars($pageCss); ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="style.css/responsive.css">
</head>

<body>

<header class="top-header">
        <nav class="navbar">
            <div class="logo">
                <img src="image/m.jpg" alt="Logo ASITECH">
                <div class="logo-text">
                    <span class="brand">ASCITECH</span>
                    <span class="tagline">Discipline - Excellence</span>
                </div>
            </div>

            <ul class="nav-links">
                <li><a href="accueil.php" class="<?php echo navLinkClass('accueil.php', $currentPage); ?>">Accueil</a></li>
                <li><a href="classes.php" class="<?php echo navLinkClass('classes.php', $currentPage); ?>">Classes</a></li>
                <li><a href="cycles.php" class="<?php echo navLinkClass('cycles.php', $currentPage); ?>">Cycles</a></li>
                <li><a href="enseignants.php" class="<?php echo navLinkClass('enseignants.php', $currentPage); ?>">Enseignants</a></li>
                <li><a href="actualite.php" class="<?php echo navLinkClass('actualite.php', $currentPage); ?>">Actualités</a></li>
                <li><a href="propos.php" class="<?php echo navLinkClass('propos.php', $currentPage); ?>">À propos</a></li>
                <li><a href="paiement.php" class="<?php echo navLinkClass('paiement.php', $currentPage); ?>">Paiement</a></li>
                <li><a href="espace_eleve.php" class="<?php echo navLinkClass('espace_eleve.php', $currentPage); ?>">Espace eleve</a></li>
            </ul>

        
<?php if (isset($_SESSION['parent_id'])): ?>
    <?php if ($isAccueilPage): ?>
        <span class="welcome-text welcome-badge">
            Bonjour, <?php echo htmlspecialchars($_SESSION['parent_nom']); ?>
        </span>
    <?php endif; ?>
    <a href="deconnexion.php" class="btn-cta" style="background-color: #dc3545; color: white; padding: 10px 20px; border-radius: 20px; text-decoration: none;">Se déconnecter</a>

<?php else: ?>
    <a href="connexion.php" class="btn-cta" style="background-color: #28a745; color: white; padding: 10px 24px; border-radius: 20px; text-decoration: none; font-weight: bold; display: inline-block;">Se connecter</a>
<?php endif; ?>
        </nav>
    </header>

  
