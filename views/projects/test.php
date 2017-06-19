<?php
if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "get_questions") 
{
    $app_questions = file_get_contents('http://localhost/API/vs-oade_api.php?action=get_questions&id=1');
    $app_questions = json_decode($app_questions, true);
    print_r($app_questions);
  ?>
    <ul>
    <?php foreach ($app_questions as $question): ?>
      <li>
        <?php echo $question["question"] ?>
    </li>
    <?php endforeach; ?>
    </ul>
  <?php
}
else // else take the app list
{
  $app_list = file_get_contents('http://localhost/API/api.php?action=get_app_list');
  $app_list = json_decode($app_list, true);
  ?>
    <ul>
    <?php foreach ($app_list as $app): ?>
      <li>
        <a href="<?php echo "http://localhost/vs-oade/projects/test?action=get_app&id=" . $app["id"] ?>"><?php echo $app["name"] ?></a>
    </li>
    <?php endforeach; ?>
    </ul>
  <?php
} 

