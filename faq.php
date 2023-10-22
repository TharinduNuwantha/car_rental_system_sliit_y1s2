<?php 
    session_start();
    // Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page or any other appropriate action
    header("Location: login.php");
    exit;
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarHireHub.com</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .faq-item {
            margin: 20px 0;
        }
        .faq-question {
            font-weight: bold;
        }
    </style>
</head>
<body>


        <!-- top navigation bar start -->

        <?php include('headder.php'); ?>

        <!-- mobile nav END -->
        
       
       <br><br><br>


       <div class="container">
        <h1>Frequently Asked Questions (FAQ)</h1>

        <div class="faq-item">
            <div class="faq-question">Q: How do I rent a car from your service?</div>
            <div class="faq-answer">A: Renting a car is easy! You can book a car online through our website, or you can visit one of our rental locations in person.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: What types of cars do you offer for rental?</div>
            <div class="faq-answer">A: We offer a variety of car types, including compact cars, SUVs, luxury vehicles, and more. You can choose the one that suits your needs and preferences.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: What are the rental requirements?</div>
            <div class "faq-answer">A: To rent a car, you typically need a valid driver's license, a credit card, and to meet the minimum age requirement. Specific requirements may vary, so please check our terms and conditions for details.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: How can I extend my rental period?</div>
            <div class="faq-answer">A: If you need to extend your rental period, please contact our customer support, and they will assist you with the process.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: What is your cancellation policy?</div>
            <div class="faq-answer">A: Our cancellation policy may vary depending on the reservation details. Please refer to your booking confirmation or contact our customer support for cancellation information.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Do you offer insurance options for rentals?</div>
            <div class="faq-answer">A: Yes, we offer insurance options to provide you with peace of mind during your rental. You can choose from various coverage levels to suit your needs.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Can I pick up and return the car at different locations?</div>
            <div class="faq-answer">A: In most cases, we offer one-way rentals that allow you to pick up and return the car at different locations. Additional fees may apply, so check with us for details.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Are there any age restrictions for renting a car?</div>
            <div class="faq-answer">A: Yes, there are age restrictions. Typically, you must be at least 21 years old to rent a car with us. However, these restrictions can vary, so please check our terms and conditions for specifics.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: What payment methods do you accept?</div>
            <div class="faq-answer">A: We accept major credit and debit cards for payment, including Visa, MasterCard, and American Express. Cash payments may also be accepted at some locations.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Do you offer discounts for long-term rentals?</div>
            <div class="faq-answer">A: Yes, we offer discounts for extended rentals. The longer you rent a car, the more you can save. Contact us for more information on long-term rental discounts.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Can I add an additional driver to my rental?</div>
            <div class="faq-answer">A: Yes, you can usually add an additional driver to your rental. There may be a fee for this service, and the additional driver must meet our requirements.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: What if I have an issue with the rented car during my trip?</div>
            <div class="faq-answer">A: If you encounter any issues with the rented car, please contact our 24/7 customer support, and they will assist you with resolving the problem.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Can I change or modify my reservation?</div>
            <div class="faq-answer">A: Yes, you can make changes to your reservation, such as the pickup location or rental duration. Please contact us to request any modifications.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Is there a mileage limit on rentals?</div>
            <div class="faq-answer">A: Most of our rentals come with unlimited mileage. However, some special promotions or vehicles may have mileage restrictions. Check your rental agreement for details.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Do you provide child seats or other equipment?</div>
            <div class="faq-answer">A: Yes, we offer child seats, GPS units, and other equipment for rent. You can request these items when making your reservation.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: How do I return the car after-hours?</div>
            <div class="faq-answer">A: If you need to return the car after our office hours, we have drop-off options available. Contact us in advance to make the necessary arrangements.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: What should I do in case of an accident or breakdown?</div>
            <div class="faq-answer">A: In the event of an accident or breakdown, please call our emergency assistance number immediately. We will guide you through the necessary steps to ensure your safety and the car's condition.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Can I rent a car for a specific event or occasion?</div>
            <div class="faq-answer">A: Yes, you can rent a car for special events, such as weddings, conferences, or vacations. Contact us to discuss your specific requirements and get a customized solution.</div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Q: Do you offer delivery and pickup services?</div>
            <div class="faq-answer">A: We may offer delivery and pickup services at some locations. Please inquire about this service when making your reservation.</div>
        </div>
    </div>

    <!-- footer Start -->
   
    <?php include('footer.php'); ?>
<!-- footer Start end-->

</body>
</html>