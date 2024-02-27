
use insafilm

DROP Table events

CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    color VARCHAR(20) NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    description TEXT
);
