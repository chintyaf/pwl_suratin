-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema suratin
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `suratin` ;

-- -----------------------------------------------------
-- Schema suratin
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `suratin` DEFAULT CHARACTER SET utf8mb3 ;
USE `suratin` ;

-- -----------------------------------------------------
-- Table `suratin`.`cache`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`cache` ;

CREATE TABLE IF NOT EXISTS `suratin`.`cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`cache_locks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`cache_locks` ;

CREATE TABLE IF NOT EXISTS `suratin`.`cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`failed_jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`failed_jobs` ;

CREATE TABLE IF NOT EXISTS `suratin`.`failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`job_batches`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`job_batches` ;

CREATE TABLE IF NOT EXISTS `suratin`.`job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT NOT NULL,
  `pending_jobs` INT NOT NULL,
  `failed_jobs` INT NOT NULL,
  `failed_job_ids` LONGTEXT NOT NULL,
  `options` MEDIUMTEXT NULL DEFAULT NULL,
  `cancelled_at` INT NULL DEFAULT NULL,
  `created_at` INT NOT NULL,
  `finished_at` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`jobs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`jobs` ;

CREATE TABLE IF NOT EXISTS `suratin`.`jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT UNSIGNED NOT NULL,
  `reserved_at` INT UNSIGNED NULL DEFAULT NULL,
  `available_at` INT UNSIGNED NOT NULL,
  `created_at` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `jobs_queue_index` (`queue` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`mahasiswa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`mahasiswa` ;

CREATE TABLE IF NOT EXISTS `suratin`.`mahasiswa` (
  `nrp` VARCHAR(9) NOT NULL,
  `name` VARCHAR(120) NULL DEFAULT NULL,
  `address` VARCHAR(300) NULL DEFAULT NULL,
  `birth_date` DATE NULL DEFAULT NULL,
  `phone` VARCHAR(16) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `profile_picture` VARCHAR(15) NULL DEFAULT NULL,
  `password` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`nrp`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`migrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`migrations` ;

CREATE TABLE IF NOT EXISTS `suratin`.`migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`password_reset_tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`password_reset_tokens` ;

CREATE TABLE IF NOT EXISTS `suratin`.`password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`program_studi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`program_studi` ;

CREATE TABLE IF NOT EXISTS `suratin`.`program_studi` (
  `id_prodi` VARCHAR(2) NOT NULL,
  `name_prodi` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`id_prodi`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`role` ;

CREATE TABLE IF NOT EXISTS `suratin`.`role` (
  `id_role` VARCHAR(2) NOT NULL,
  `name_role` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`sessions` ;

CREATE TABLE IF NOT EXISTS `suratin`.`sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` VARCHAR(255) NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `sessions_user_id_index` (`user_id` ASC) ,
  INDEX `sessions_last_activity_index` (`last_activity` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `suratin`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`users` ;

CREATE TABLE IF NOT EXISTS `suratin`.`users` (
  `nip` VARCHAR(7) NOT NULL,
  `name` VARCHAR(120) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `id_role` VARCHAR(2) NULL DEFAULT NULL,
  `alamat` VARCHAR(300) NULL DEFAULT NULL,
  `alamat_bandung` VARCHAR(300) NULL DEFAULT NULL,
  `id_prodi` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`nip`),
  INDEX `fk_users_role1_idx` (`id_role` ASC) ,
  INDEX `fk_users_program_studi1_idx` (`id_prodi` ASC) ,
  CONSTRAINT `fk_users_program_studi1`
    FOREIGN KEY (`id_prodi`)
    REFERENCES `suratin`.`program_studi` (`id_prodi`),
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`id_role`)
    REFERENCES `suratin`.`role` (`id_role`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`surat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`surat` ;

CREATE TABLE IF NOT EXISTS `suratin`.`surat` (
  `id_surat` VARCHAR(25) NOT NULL,
  `dokumen` VARCHAR(25) NULL DEFAULT NULL,
  `status` VARCHAR(25) NULL DEFAULT NULL,
  `nip` VARCHAR(7) NOT NULL,
  `type_surat` VARCHAR(50) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `catatan` VARCHAR(300) NULL DEFAULT NULL,
  PRIMARY KEY (`id_surat`),
  INDEX `fk_surat_users_idx` (`nip` ASC) ,
  CONSTRAINT `fk_surat_users`
    FOREIGN KEY (`nip`)
    REFERENCES `suratin`.`users` (`nip`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`surat_keterangan_lulus`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`surat_keterangan_lulus` ;

CREATE TABLE IF NOT EXISTS `suratin`.`surat_keterangan_lulus` (
  `surat_id_surat` VARCHAR(25) NOT NULL,
  `tanggal_kelulusan` DATE NOT NULL,
  INDEX `fk_surat_keterangan_lulus_surat1_idx` (`surat_id_surat` ASC) ,
  CONSTRAINT `fk_surat_keterangan_lulus_surat1`
    FOREIGN KEY (`surat_id_surat`)
    REFERENCES `suratin`.`surat` (`id_surat`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`surat_keterangan_mahasiswa_aktif`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`surat_keterangan_mahasiswa_aktif` ;

CREATE TABLE IF NOT EXISTS `suratin`.`surat_keterangan_mahasiswa_aktif` (
  `surat_id_surat` VARCHAR(25) NOT NULL,
  `periode` VARCHAR(20) NOT NULL,
  `alamat_bandung` VARCHAR(300) NOT NULL,
  `keperluan_pengajuan` VARCHAR(200) NOT NULL,
  INDEX `fk_surat_keterangan_mahasiswa_aktif_surat1_idx` (`surat_id_surat` ASC) ,
  CONSTRAINT `fk_surat_keterangan_mahasiswa_aktif_surat1`
    FOREIGN KEY (`surat_id_surat`)
    REFERENCES `suratin`.`surat` (`id_surat`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`surat_laporan_hasil_studi`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`surat_laporan_hasil_studi` ;

CREATE TABLE IF NOT EXISTS `suratin`.`surat_laporan_hasil_studi` (
  `surat_id_surat` VARCHAR(25) NOT NULL,
  `keperluan_pembuatan` VARCHAR(200) NOT NULL,
  INDEX `fk_surat_laporan_hasil_studi_surat1_idx` (`surat_id_surat` ASC) ,
  CONSTRAINT `fk_surat_laporan_hasil_studi_surat1`
    FOREIGN KEY (`surat_id_surat`)
    REFERENCES `suratin`.`surat` (`id_surat`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `suratin`.`surat_pengantar_tugas_mata_kuliah`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`surat_pengantar_tugas_mata_kuliah` ;

CREATE TABLE IF NOT EXISTS `suratin`.`surat_pengantar_tugas_mata_kuliah` (
  `surat_id_surat` VARCHAR(25) NOT NULL,
  `ditujukan_kepada` VARCHAR(120) NOT NULL,
  `mata_kuliah` VARCHAR(50) NOT NULL,
  `periode` VARCHAR(20) NOT NULL,
  `nama_anggota_kelompok` VARCHAR(600) NOT NULL,
  `tujuan` VARCHAR(200) NOT NULL,
  `topik` VARCHAR(100) NOT NULL,
  INDEX `fk_surat_pengantar_tugas_mata_kuliah_surat1_idx` (`surat_id_surat` ASC) ,
  CONSTRAINT `fk_surat_pengantar_tugas_mata_kuliah_surat1`
    FOREIGN KEY (`surat_id_surat`)
    REFERENCES `suratin`.`surat` (`id_surat`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
