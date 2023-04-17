<?php
    require './db_conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <div class="add-section">
            <!-- CAIXA DE ADIÇÃO DA TASK -->
            <form id="new-task-form" 
                action=".\app\add.php" 
                method="POST" 
                autocomplete="off">
                    <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                            <input class="add-task"
                                type="text"
                                name="title"
                                style="border-color: #ff6666"
                                background-color="transparent";
                                placeholder="So what?" />
                            <button type="submit"> Add <span>&nbsp;</span></button>                

                        <?php }else{ ?>
                            <input type="text"
                                name="title"
                                placeholder="So what?" />
                            <button type="submit"> Add <span>&nbsp;</span></button>
                    <?php } ?>
            </form>
        </div>
    </header>

    <main class="container">

        <section class="col1"> <!-- COLUNA TO DO -->
            <h2>TO-DO</h2>  <!-- PRECISA DESSA CLASS? -->
            <div id="todos-item">
                <?php
                    $todos = $conn->query("SELECT * 
                        FROM todos 
                        WHERE task_status = 'ToDo'
                        ORDER BY id ASC");
                    echo '<pre>'; 
                    $todos = $todos->fetchAll(PDO::FETCH_OBJ);
                        foreach($todos as $task){
                ?>
                <div class="task">
                    <?php 
                        echo $task->task_title; 
                        echo " - ";
                        echo $task->date_time;
                    } ?>
                </div>
                <button type="todo-inprogress"> In Progress </button>

            </div>
        </section>

        <section class="col2"> <!-- COLUNA IN PROGRESS -->
            <h2>IN PROGRESS</h2> 
            <div id="inprogress-item">
                
            </div>
        </section>

        <section class="col3"> <!-- COLUNA DONE -->
            <h2>DONE</h2>
            <div id="done-item">
            
            </div>
        </section>

    </main>

    <footer>
        Produzido por Isabela Stolf, em abril de 2023.
    </footer>

    <script src="./js/jquery-3.2.1.min.js"></script>

<script>
    $(document).ready(function(){
        $('.remove-to-do').click(function(){
            const id = $(this).attr('id');
            
            $.post("app/remove.php",
                {
                    id: id
                },
                (data) => {
                    if(data){
                        $(this).parent().hide(600);
                    }
                }
            );
        });

        $(".check-box").click(function(e) {
            const id = $(this).attr('data-todo-id');

            $.post('app/check.php',
                {
                    id: id
                },
                (data) => {
                    if(data != 'error'){
                        const h2 = $(this).next();
                        if(data === '1'){
                            h2.removeClass('checked');
                        }else {
                            h2.addClass('checked');
                        }
                    }
                }
            );
        });
    });
</script>

</body>
</html>