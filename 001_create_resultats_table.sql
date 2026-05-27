-- Table pour stocker les resultats des eleves
CREATE TABLE IF NOT EXISTS resultats (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    inscription_id INT UNSIGNED NOT NULL,
    parent_id INT UNSIGNED NOT NULL,
    cours VARCHAR(150) NOT NULL,
    note DECIMAL(5,2) DEFAULT NULL,
    appreciation VARCHAR(255) DEFAULT NULL,
    date_evaluation DATE DEFAULT NULL,
    semestre VARCHAR(50) DEFAULT NULL,
    annee_scolaire VARCHAR(20) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
