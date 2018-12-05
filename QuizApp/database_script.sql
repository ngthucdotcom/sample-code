CREATE TABLE IF NOT EXISTS `quiz_users` (
  `username` varchar(64) NOT NULL PRIMARY KEY,
  `fullname` varchar(254) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question` varchar(254) NOT NULL,
  `answer` int(5) NULL,
  `level` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE IF NOT EXISTS `quiz_answers` (
  `id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `answer` varchar(254) NOT NULL,
  `question` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE IF NOT EXISTS `quiz_exams` (
  `id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `exam` varchar(254) NOT NULL,
  `teacher` varchar(64) NOT NULL,
  `point_per_question` int(5) NOT NULL,
  `point_require` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE IF NOT EXISTS `quiz_exam_questions` (
  `id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `examcode` int(5) NOT NULL,
  `questionid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

CREATE TABLE IF NOT EXISTS `quiz_results` (
  `id` int(5) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `examcode` int(5) NOT NULL,
  `teacher` varchar(64) NOT NULL,
  `student` varchar(64) NOT NULL,
  `right` int(5) NOT NULL,
  `wrong` int(5) NOT NULL,
  `point` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

ALTER TABLE quiz_questions ADD CONSTRAINT fk_questionanswer FOREIGN KEY (answer) REFERENCES quiz_answers(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_answers ADD CONSTRAINT fk_answerquestion FOREIGN KEY (question) REFERENCES quiz_questions(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_exams ADD CONSTRAINT fk_examteacher FOREIGN KEY (teacher) REFERENCES quiz_users(username) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_exam_questions ADD CONSTRAINT fk_examcode FOREIGN KEY (examcode) REFERENCES quiz_exams(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_exam_questions ADD CONSTRAINT fk_examquestion FOREIGN KEY (questionid) REFERENCES quiz_questions(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_results ADD CONSTRAINT fk_resultexamcode FOREIGN KEY (examcode) REFERENCES quiz_exam_questions(examcode) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_results ADD CONSTRAINT fk_resultteacher FOREIGN KEY (teacher) REFERENCES quiz_users(username) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE quiz_results ADD CONSTRAINT fk_resultstudent FOREIGN KEY (student) REFERENCES quiz_users(username) ON UPDATE CASCADE ON DELETE CASCADE;
