<?php

// �v���W�F�N�g�̐ݒ�t�@�C����ǂݍ���
require_once __DIR__.'/../config/ProjectConfiguration.class.php';

// �A�v���P�[�V�����̐ݒ���擾
$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'dev', true);

// �A�v���P�[�V�����̃t�����g�R���g���[�����N��
sfContext::createInstance($configuration)->dispatch();

