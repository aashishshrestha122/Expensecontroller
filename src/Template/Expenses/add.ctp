<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expense[]|\Cake\Collection\CollectionInterface $expenses
 */
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Expense'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Balances'), ['controller' => 'Balances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Balance'), ['controller' => 'Balances', 'action' => 'add']) ?></li>
    </ul>
</nav>          

<div class="container">
    <div class = "expenses index large-9 medium-8 columns content">
   <?= $this->Form->create('expenses',['id' => 'd']) ?>
    <?php echo $this->Form->select('balance_id',$balances,['empty' =>'(choose balance ID)', 'id' => 'selectbox']); ?>
    <div id="amount">
        Amount
    </div><br>
    <div class="test">    
        <div class="a">
            <select name = "data[0][title]" id="select" class="select">
                <option value="saving">Savings</option>
                <option value="school">School</option>
                <option value="college">Colleges</option>
                <option value="apartment">Apartments</option>
            </select>
            <input type="number" name="data[0][amount]"  id = "amt0">
            <br><br>
        </div>
    </div>
    <input type="button" id = "button" name="add" value="Add next Expense" ><br><br>
   <?= $this->Form->button(__('Submit')) ?>
   <?= $this->Form->end() ?>
   </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        var amt = 0;
        $("#button").click(function(){
            counter = counter + 1;
            $(".test").append('<div class="a"><select name = "data['+counter+'][title]" id="select"><option value="saving">Savings</option><option value="school">School</option><option value="college">Colleges</option><option value="apartment">Apartments</option></select><input type="number" name="data['+counter+'][amount]"  id = "amt'+counter+'"><br><br></div>');
        });


        $('#selectbox').change(function(){
            var date = $('#selectbox').find(':selected').val();
           // console.log(date);
            var url = "<?php echo $this->Url->build('/expenses/abc/');?>"+date;
            // console.log(url);
            $.ajax({
                url: url,
                dataType: 'json',
                success: function(data) {
                    amt = data;
                    // console.log(amt);

                if(!amt){
                   $('#amount').hide();
                }else{
                   $('#amount').html('Amount:' +amt).show();  

                }
                },
            });
        });
 
        $("#form").submit(function(event){
            var b = 0;
             // console.log(counter);
            for (var i = 0; i <= counter; i++) {
                var a = $("#amt"+i).val(); // #amt0
                var b = b + parseInt(a);
                // console.log(a);
            }
            // console.log(b);
            // console.log(amt);
            if (b == parseInt(amt)) {
                return true;
            }
            else{
                alert('value didnt matched');
                event.preventDefault();
            }
        });
    });



     
</script>

<style type="text/css">
    #select{
        width: 100px !important;
    }
    #selectbox{
        width: 200px !important;
    }
     .amt{
        width: 100px !important;
    }

    #amount{
        display: none;
    }
    #amt0{
        width: 100px !important;
    }
    #amt1{
        width: 100px !important;
    }
    #amt2{
        width: 100px !important;
    }
</style>
