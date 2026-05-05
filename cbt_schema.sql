CREATE TABLE IF NOT EXISTS cbt_exams (
  id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  class_id INT NOT NULL,
  subject_id INT NOT NULL,
  duration_minutes INT NOT NULL,
  instructions TEXT,
  start_at DATETIME NOT NULL,
  end_at DATETIME NOT NULL,
  status ENUM('draft', 'published', 'archived') DEFAULT 'draft',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (class_id) REFERENCES class(class_id) ON DELETE CASCADE,
  FOREIGN KEY (subject_id) REFERENCES subject(subject_id) ON DELETE CASCADE,
  INDEX idx_class_id (class_id),
  INDEX idx_subject_id (subject_id),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS cbt_questions (
  id INT PRIMARY KEY AUTO_INCREMENT,
  exam_id INT NOT NULL,
  question_text TEXT NOT NULL,
  question_type ENUM('mcq', 'fill_blank') NOT NULL,
  marks INT DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (exam_id) REFERENCES cbtexams(id) ON DELETE CASCADE,
  INDEX idx_exam_id (exam_id),
  INDEX idx_question_type (question_type)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS mcq_options (
  id INT PRIMARY KEY AUTO_INCREMENT,
  question_id INT NOT NULL,
  option_text TEXT NOT NULL,
  is_correct BOOLEAN DEFAULT FALSE,
  label VARCHAR(10) NOT NULL,
  position INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (question_id) REFERENCES cbt_questions(id) ON DELETE CASCADE,
  INDEX idx_question_id (question_id),
  UNIQUE KEY unique_question_position (question_id, position)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS answers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  question_id INT NOT NULL,
  correct_answer TEXT NOT NULL,
  FOREIGN KEY (question_id) REFERENCES cbt_questions(id) ON DELETE CASCADE,
  INDEX idx_question_id (question_id),
  UNIQUE KEY unique_question_answer (question_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS exam_attempts (
  id INT PRIMARY KEY AUTO_INCREMENT,
  exam_id INT NOT NULL,
  student_id INT NOT NULL,
  score INT DEFAULT 0,
  status ENUM('in_progress', 'submitted') DEFAULT 'in_progress',
  started_at DATETIME NOT NULL,
  submitted_at DATETIME,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (exam_id) REFERENCES exams(id) ON DELETE CASCADE,
  FOREIGN KEY (student_id) REFERENCES student(student_id) ON DELETE CASCADE,
  INDEX idx_exam_id (exam_id),
  INDEX idx_student_id (student_id),
  INDEX idx_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS student_answers (
  id INT PRIMARY KEY AUTO_INCREMENT,
  attempt_id INT NOT NULL,
  question_id INT NOT NULL,
  selected_option_id INT,
  answer_text TEXT,
  is_correct BOOLEAN DEFAULT FALSE,
  answered_at DATETIME NOT NULL,
  FOREIGN KEY (attempt_id) REFERENCES exam_attempts(id) ON DELETE CASCADE,
  FOREIGN KEY (question_id) REFERENCES cbt_questions(id) ON DELETE CASCADE,
  FOREIGN KEY (selected_option_id) REFERENCES options(id) ON DELETE SET NULL,
  UNIQUE KEY unique_attempt_question (attempt_id, question_id),
  INDEX idx_attempt_id (attempt_id),
  INDEX idx_question_id (question_id),
  INDEX idx_selected_option_id (selected_option_id),
  INDEX idx_is_correct (is_correct)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
