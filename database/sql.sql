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
CREATE SCHEMA IF NOT EXISTS `suratin` DEFAULT CHARACTER SET utf8 ;
USE `suratin` ;

-- -----------------------------------------------------
-- Table `suratin`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`role` ;

CREATE TABLE IF NOT EXISTS `suratin`.`role` (
  `id_role` VARCHAR(2) NOT NULL,
  `name_role` VARCHAR(45) NULL,
  PRIMARY KEY (`id_role`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suratin`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`users` ;

CREATE TABLE IF NOT EXISTS `suratin`.`users` (
  `nip` VARCHAR(7) NOT NULL,
  `name` VARCHAR(120) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `id_role` VARCHAR(2) NULL,
  `alamat` VARCHAR(300) NULL,
  `alamat_bandung` VARCHAR(300) NULL,
  PRIMARY KEY (`nip`),
  INDEX `fk_users_role1_idx` (`id_role` ASC) ,
  CONSTRAINT `fk_users_role1`
    FOREIGN KEY (`id_role`)
    REFERENCES `suratin`.`role` (`id_role`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suratin`.`mahasiswa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`mahasiswa` ;

CREATE TABLE IF NOT EXISTS `suratin`.`mahasiswa` (
  `nrp` VARCHAR(9) NOT NULL,
  `name` VARCHAR(120) NULL,
  `address` VARCHAR(300) NULL,
  `birth_date` DATE NULL,
  `phone` VARCHAR(16) NULL,
  `email` VARCHAR(45) NULL,
  `profile_picture` VARCHAR(15) NULL,
  `password` VARCHAR(100) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`nrp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `suratin`.`surat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `suratin`.`surat` ;

CREATE TABLE IF NOT EXISTS `suratin`.`surat` (
  `id_surat` VARCHAR(25) NOT NULL,
  `dokumen` VARCHAR(25) NULL,
  `status` VARCHAR(25) NULL,
  `nip` VARCHAR(7) NOT NULL,
  `type_surat` VARCHAR(50) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id_surat`),
  INDEX `fk_surat_users_idx` (`nip` ASC) ,
  CONSTRAINT `fk_surat_users`
    FOREIGN KEY (`nip`)
    REFERENCES `suratin`.`users` (`nip`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


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
    REFERENCES `suratin`.`surat` (`id_surat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


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
    REFERENCES `suratin`.`surat` (`id_surat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


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
    REFERENCES `suratin`.`surat` (`id_surat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


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
    REFERENCES `suratin`.`surat` (`id_surat`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
