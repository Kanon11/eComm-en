<?php

namespace App\Admin\Controllers;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('product_id', __('Product id'));
        $grid->column('user_id', __('User id'));
        $grid->column('status', __('Status'));
        $grid->column('payment_method', __('Payment method'));
        $grid->column('payment_status', __('Payment status'));
        $grid->column('address', __('Address'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('product_id', __('Product id'));
        $show->field('user_id', __('User id'));
        $show->field('status', __('Status'));
        $show->field('payment_method', __('Payment method'));
        $show->field('payment_status', __('Payment status'));
        $show->field('address', __('Address'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->number('product_id', __('Product id'));
        $form->number('user_id', __('User id'));
        $form->text('status', __('Status'));
        $form->text('payment_method', __('Payment method'));
        $form->text('payment_status', __('Payment status'));
        $form->text('address', __('Address'));

        return $form;
    }
}
