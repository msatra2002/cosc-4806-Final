<?php require_once 'app/views/templates/header.php' ?>
<nav aria-label="breadcrumb" >
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">reminders</li>
  </ol>
</nav>
<div >
    <div >
        <div >
            <div >
                <h1>Reminders</h1>
                 <p> <a href= "/reminders/create">Create a reminder</a></p>
            </div>
        </div>
    </div>
<style>
  
  .breadcrumb {
      margin-left: 50px; /* 10px away from the left side */
  }

  
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap");

    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      
    }

    body {
      --color: rgba(30, 30, 30);
      --bgColor: rgba(245, 245, 245);
      min-height: 50vh;
      display: grid;
      align-content: center;
      gap: 2rem;
      
      font-family: "Poppins", sans-serif;
      color: var(--color);
      background: var(--bgColor);
    }

    h1 {
      text-align: center;
    }

   ul {
      --col-gap: 2rem;
      --row-gap: 2rem;
      --line-w: 0.25rem;
      display: grid;
      grid-template-columns: var(--line-w) 1fr;
      grid-auto-columns: max-content;
      column-gap: var(--col-gap);
      list-style: none;
      width: min(60rem, 90%);
      margin-inline: auto;
    }
    .head {
      position: fixed;
      top: 0;
      width: 100%;
    }
    /* line */
   ul::before {
      content: "";
      grid-column: 1;
      grid-row: 1 / span 20;
      background: rgb(225, 225, 225);
      border-radius: calc(var(--line-w) / 2);
    }

    /* columns*/

    /* row gaps */
   ul li:not(:last-child) {
      margin-bottom: var(--row-gap);
    }

    /* card */
   ul li {
      grid-column: 2;
      --inlineP: 1.5rem;
      margin-inline: var(--inlineP);
      grid-row: span 2;
      display: grid;
      grid-template-rows: min-content min-content min-content;
    }

    /* date */
   ul li .date {
      --dateH: 3rem;
      height: var(--dateH);
      margin-inline: calc(var(--inlineP) * -1);

      text-align: center;
      background-color: var(--accent-color);

      color: white;
      font-size: 1.25rem;
      font-weight: 700;

      display: grid;
      place-content: center;
      position: relative;

      border-radius: calc(var(--dateH) / 2) 0 0 calc(var(--dateH) / 2);
    }

    /* date flap */
   ul li .date::before {
      content: "";
      width: var(--inlineP);
      aspect-ratio: 1;
      background: var(--accent-color);
      background-image: linear-gradient(rgba(0, 0, 0, 0.2) 100%, transparent);
      position: absolute;
      top: 100%;

      clip-path: polygon(0 0, 100% 0, 0 100%);
      right: 0;
    }

    /* circle */
   ul li .date::after {
      content: "";
      position: absolute;
      width: 2rem;
      aspect-ratio: 1;
      background: var(--bgColor);
      border: 0.3rem solid var(--accent-color);
      border-radius: 50%;
      top: 50%;

      transform: translate(50%, -50%);
      right: calc(100% + var(--col-gap) + var(--line-w) / 2);
    }

    /* title descr */
   ul li .title,
   ul li .descr {
      background: var(--bgColor);
      position: relative;
      padding-inline: 1.5rem;
    }
   ul li .title {
      overflow: hidden;
      padding-block-start: 1.5rem;
      padding-block-end: 1rem;
      font-weight: 500;
    }
   ul li .descr {
      padding-block-end: 1.5rem;
      font-weight: 300;
    }

    /* shadows */
   ul li .title::before,
   ul li .descr::before {
      content: "";
      position: absolute;
      width: 90%;
      height: 0.5rem;
      background: rgba(0, 0, 0, 0.5);
      left: 50%;
      border-radius: 50%;
      filter: blur(4px);
      transform: translate(-50%, 50%);
    }
   ul li .title::before {
      bottom: calc(100% + 0.125rem);
    }

     ul li .descr::before {
      z-index: -1;
      bottom: 0.25rem;
    }

     @media (min-width: 40rem) {
      ul {
        grid-template-columns: 1fr var(--line-w) 1fr;
      }
      ul::before {
        grid-column: 2;
      }
      ul li:nth-child(odd) {
        grid-column: 1;
      }
      ul li:nth-child(even) {
        grid-column: 3;
      }

      /* start second card */
      ul li:nth-child(2) {
        grid-row: 2/4;
      }

      ul li:nth-child(odd) .date::before {
        clip-path: polygon(0 0, 100% 0, 100% 100%);
        left: 0;
      }

      ul li:nth-child(odd) .date::after {
        transform: translate(-50%, -50%);
        left: calc(100% + var(--col-gap) + var(--line-w) / 2);
      }
      ul li:nth-child(odd) .date {
        border-radius: 0 calc(var(--dateH) / 2) calc(var(--dateH) / 2) 0;
      }
    }

    .credits {
      margin-top: 1rem;
      text-align: right;
    }
    .credits a {
      color: var(--color);
    }
  .button-container {
      display: flex;          /* Enables Flexbox */
      justify-content: center; 
         
  }
</style>
    <ul>
    
        <?php foreach ($data['reminders'] as $reminder){
  echo "<li style=\"--accent-color:#41516C\">";
  
            
            
            echo "<div class=\"date\">".$reminder['created_at']."</div>";
            echo "<div class=\"descr\">".$reminder['subject']."</div>";
            echo "<div class=\"title\">".$reminder['username']."</div>";
            echo "<div class=\"button-container\">";
            echo "<form action=\"/reminders/update\" method=\"post\" >";
            echo "<input type='hidden' name='id' value=' ".$reminder['id']." ' >";
            echo "<input type='hidden' name='subject' value=' ".$reminder['subject']." ' >";
  echo "<button type=\"submit\" class=\"btn btn-primary\">update</button> ";
  echo "</form>";
  echo "<form action=\"/reminders/delete\" method=\"post\" >";
  echo "<input type='hidden' name='id' value=' ".$reminder['id']." ' >";
  echo "<button type=\"submit\" class=\"btn btn-primary\">delete</button></div>";
  echo "</form>";
  

            echo "</li>";
            
        } ?>


































    
   
    <?php require_once 'app/views/templates/footer.php' ?>