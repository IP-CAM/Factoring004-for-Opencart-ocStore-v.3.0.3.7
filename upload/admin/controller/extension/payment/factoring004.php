<?php

/**
 * @property-read \Loader $load
 */
class ControllerExtensionPaymentFactoring004 extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/payment/factoring004');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('setting/setting');
        $this->load->model('localisation/order_status');

        if (($this->request->server['REQUEST_METHOD'] === 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('payment_factoring004', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extensions'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/payment/factoring004', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/payment/factoring004', 'user_token=' . $this->session->data['user_token'], true);
        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);

        $data['user_token'] = $this->session->data['user_token'];

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['api_host'])) {
            $data['error_api_host'] = $this->error['api_host'];
        } else {
            $data['error_api_host'] = '';
        }

        if (isset($this->error['oauth_login'])) {
            $data['error_oauth_login'] = $this->error['oauth_login'];
        } else {
            $data['error_oauth_login'] = '';
        }

        if (isset($this->error['oauth_password'])) {
            $data['error_oauth_password'] = $this->error['oauth_password'];
        } else {
            $data['error_oauth_password'] = '';
        }

        if (isset($this->error['partner_name'])) {
            $data['error_partner_name'] = $this->error['partner_name'];
        } else {
            $data['error_partner_name'] = '';
        }

        if (isset($this->error['partner_code'])) {
            $data['error_partner_code'] = $this->error['partner_code'];
        } else {
            $data['error_partner_code'] = '';
        }

        if (isset($this->error['point_code'])) {
            $data['error_point_code'] = $this->error['point_code'];
        } else {
            $data['error_point_code'] = '';
        }

        if (isset($this->request->post['payment_factoring004_api_host'])) {
            $data['payment_factoring004_api_host'] = $this->request->post['payment_factoring004_api_host'];
        } else {
            $data['payment_factoring004_api_host'] = $this->config->get('payment_factoring004_api_host');
        }

        if (isset($this->request->post['payment_factoring004_oauth_login'])) {
            $data['payment_factoring004_oauth_login'] = $this->request->post['payment_factoring004_oauth_login'];
        } else {
            $data['payment_factoring004_oauth_login'] = $this->config->get('payment_factoring004_oauth_login');
        }

        if (isset($this->request->post['payment_factoring004_oauth_password'])) {
            $data['payment_factoring004_oauth_password'] = $this->request->post['payment_factoring004_oauth_password'];
        } else {
            $data['payment_factoring004_oauth_password'] = $this->config->get('payment_factoring004_oauth_password');
        }

        if (isset($this->request->post['payment_factoring004_partner_name'])) {
            $data['payment_factoring004_partner_name'] = $this->request->post['payment_factoring004_partner_name'];
        } else {
            $data['payment_factoring004_partner_name'] = $this->config->get('payment_factoring004_partner_name');
        }

        if (isset($this->request->post['payment_factoring004_partner_code'])) {
            $data['payment_factoring004_partner_code'] = $this->request->post['payment_factoring004_partner_code'];
        } else {
            $data['payment_factoring004_partner_code'] = $this->config->get('payment_factoring004_partner_code');
        }

        if (isset($this->request->post['payment_factoring004_point_code'])) {
            $data['payment_factoring004_point_code'] = $this->request->post['payment_factoring004_point_code'];
        } else {
            $data['payment_factoring004_point_code'] = $this->config->get('payment_factoring004_point_code');
        }

        if (isset($this->request->post['payment_factoring004_paid_order_status_id'])) {
            $data['payment_factoring004_paid_order_status_id'] = $this->request->post['payment_factoring004_paid_order_status_id'];
        } else {
            $data['payment_factoring004_paid_order_status_id'] = $this->config->get('payment_factoring004_paid_order_status_id');
        }

        if (isset($this->request->post['payment_factoring004_unpaid_order_status_id'])) {
            $data['payment_factoring004_unpaid_order_status_id'] = $this->request->post['payment_factoring004_unpaid_order_status_id'];
        } else {
            $data['payment_factoring004_unpaid_order_status_id'] = $this->config->get('payment_factoring004_unpaid_order_status_id');
        }

        if (isset($this->request->post['payment_factoring004_debug_mode'])) {
            $data['payment_factoring004_debug_mode'] = $this->request->post['payment_factoring004_debug_mode'];
        } else {
            $data['payment_factoring004_debug_mode'] = $this->config->get('payment_factoring004_debug_mode');
        }

        if (isset($this->request->post['payment_factoring004_status'])) {
            $data['payment_factoring004_status'] = $this->request->post['payment_factoring004_status'];
        } else {
            $data['payment_factoring004_status'] = $this->config->get('payment_factoring004_status');
        }

        if (isset($this->request->post['payment_factoring004_payment_gateway_type'])) {
            $data['payment_factoring004_payment_gateway_type'] = $this->request->post['payment_factoring004_payment_gateway_type'];
        } else {
            $data['payment_factoring004_payment_gateway_type'] = $this->config->get('payment_factoring004_payment_gateway_type');
        }

        $data['text_loading'] = $this->language->get('text_loading');
        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/payment/factoring004', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/payment/factoring004')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->request->post['payment_factoring004_api_host']) {
            $this->error['api_host'] = $this->language->get('error_api_host');
        }

        if (!$this->request->post['payment_factoring004_oauth_login']) {
            $this->error['oauth_login'] = $this->language->get('error_oauth_login');
        }

        if (!$this->request->post['payment_factoring004_oauth_password']) {
            $this->error['oauth_password'] = $this->language->get('error_oauth_password');
        }

        if (!$this->request->post['payment_factoring004_partner_name']) {
            $this->error['partner_name'] = $this->language->get('error_partner_name');
        }

        if (!$this->request->post['payment_factoring004_partner_code']) {
            $this->error['partner_code'] = $this->language->get('error_partner_code');
        }

        if (!$this->request->post['payment_factoring004_point_code']) {
            $this->error['point_code'] = $this->language->get('error_point_code');
        }

        return !$this->error;
    }
}
