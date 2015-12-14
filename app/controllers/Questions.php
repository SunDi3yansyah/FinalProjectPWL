<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @package		Question Answer (https://github.com/SunDi3yansyah/FinalProjectPWL)
 * @author		Cahyadi Triyansyah (https://sundi3yansyah.com)
 * @version		1.0
 * @license		MIT
 * @copyright	Copyright (c) 2015 SunDi3yansyah
 */

class Questions extends CI_Publics
{
	function index($str = NULL)
	{
		if (!empty($str)) {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.id_question DESC', 5, $str),
				'question_tag' => $this->_question_tag(),
				);
			if (!empty($data['questions']))
			{
				$this->load->view('questions/questions_ajax', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		} else {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.id_question DESC', 5, 0),
				'question_tag' => $this->_question_tag(),
				);
			if (!empty($data['questions']))
			{
				$this->_render('questions/questions', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
	}

	function unanswereds($str = NULL)
	{
		if (!empty($str)) {
			$data = array(
				'questions' => $this->qa_model->join2_where_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', array('answer_id' => NULL), 'question.id_question DESC', 5, $str),
				'question_tag' => $this->_question_tag(),
				);
			if (!empty($data['questions']))
			{
				$this->load->view('questions/unanswereds_ajax', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		} else {
			$data = array(
				'questions' => $this->qa_model->join2_where_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', array('answer_id' => NULL), 'question.id_question DESC', 5, 0),
				'question_tag' => $this->_question_tag(),
				);
			if (!empty($data['questions']))
			{
				$this->_render('questions/unanswereds', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
	}

	function most_view($str = NULL)
	{
		if (!empty($str)) {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.viewers DESC', 5, $str),
				'question_tag' => $this->_question_tag(),
				);
			if (!empty($data['questions']))
			{
				$this->load->view('questions/most_view_ajax', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		} else {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.viewers DESC', 5, 0),
				'question_tag' => $this->_question_tag(),
				);
			if (!empty($data['questions']))
			{
				$this->_render('questions/most_view', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
	}

	// belum jadi
	function most_popular($str = NULL)
	{
		if (!empty($str)) {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.viewers DESC', 5, $str),
				);
			if (!empty($data['questions']))
			{
				$this->load->view('questions/most_popular_ajax', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		} else {
			$data = array(
				'questions' => $this->qa_model->join2_ajax('question', 'user', 'category', 'question.user_id=user.id_user', 'question.category_id=category.id_category', 'question.viewers DESC', 5, 0),
				);
			if (!empty($data['questions']))
			{
				$this->_render('questions/most_popular', $data);
			}
			else
			{
				show_404();
				return FALSE;
			}
		}
	}

    function _question_tag()
    {
        $var = $this->qa_model->join2('question_tag', 'question', 'tag', 'question_tag.question_id=question.id_question', 'question_tag.tag_id=tag.id_tag', 'question_tag.id_qt');
        return ($var == FALSE)?array():$var;
    }
}
