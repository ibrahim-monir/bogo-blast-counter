<?php

/**
 * Plugin Name: BOGO Blast Countdown
 * Description: A countdown timer for Buy 1 Get 1 Free promotions.
 * Plugin URI: ibrahimmonir.com
 * Author URI: ibrahimmonir.com
 * Author: Ibrahim Monir
 * Version: 1.0.0
 * 
 */

/**
 * Buy 1 Get 1 Free Countdown
 * Single-file implementation
 */

add_action('wp_head', function () {
    ?>
    <style>
        #bogo-countdown {
            text-align: center;
            padding: 10px;
            background: #C41230;
            color: #fff;
            /*font-family: "Century Gothic", sans-serif;*/
        }

        #bogo-countdown .title {
            font-weight: bold;
            font-size: 20px;
            display: flex;
            align-content: center;
            justify-content: center;
            gap: 20px;
        }

        #bogo-countdown .time {
            font-size: 18px;
            font-weight: bold;
        }

        #bogo-countdown .labels {
            display: flex;
            justify-content: center;
            gap: 20px;
            font-size: 12px;
            opacity: 0.8;
            margin-top: 4px;
        }
        #bogo-countdown .time-label {
          font-size: 70%;
          font-weight: 100;
        }
        @media only screen and (max-width:580px){
          #bogo-countdown .title {
    display: block;
}
        }
    </style>

    <div id="bogo-countdown">
        <div class="title"><strong>Buy 1 Get 1 Free Ends</strong>
          <div class="time">
              <span id="cd-days">00</span><span class="time-label">D</span> :
              <span id="cd-hours">00</span><span class="time-label">H</span> :
              <span id="cd-minutes">00</span><span class="time-label">M</span> :
              <span id="cd-seconds">00</span><span class="time-label">S</span>
          </div>
          <!--<div class="labels">-->
          <!--    <span>days</span>-->
          <!--    <span>hour</span>-->
          <!--    <span>min</span>-->
          <!--    <span>sec</span>-->
          <!--</div>-->
        </div>
    </div>
    <?php
});

add_action('wp_footer', function () {
    ?>
    <script>
        (function () {
            // 🔥 CHANGE END DATE HERE
            // Format: YYYY-MM-DDTHH:MM:SS
            var endDate = new Date("2026-02-11T00:00:00").getTime();

            function updateCountdown() {
                var now = new Date().getTime();
                var distance = endDate - now;

                if (distance <= 0) {
                    var el = document.getElementById("bogo-countdown");
                    if (el) el.style.display = "none";
                    return;
                }

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
                var minutes = Math.floor((distance / (1000 * 60)) % 60);
                var seconds = Math.floor((distance / 1000) % 60);

                document.getElementById("cd-days").textContent = String(days).padStart(2, "0");
                document.getElementById("cd-hours").textContent = String(hours).padStart(2, "0");
                document.getElementById("cd-minutes").textContent = String(minutes).padStart(2, "0");
                document.getElementById("cd-seconds").textContent = String(seconds).padStart(2, "0");
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);
        })();
    </script>
    <?php
});