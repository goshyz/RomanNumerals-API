<html>
    <head>
        <title>Roman numerals</title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="<?php echo url('numbers.js') ?>"></script>
        
    </head>
    <body>
    	<div>
    		<form action="#" method="post">
    			<input name="integer" type="number" min="0" max="3999" />
    			<input type="button" value="Convert" onclick="integerToRoman()" />
    		</form>
    		<label id="roman"></label>
    	</div>
    	<div>
    		<h3>View results:</h3>
    		<button name="lastValues" onclick="getLastValues()">Last converted values</button>
    		<button name="top10" onclick="getTop10()">Top 10 converted values</button>
    		<div id="results"></div>
    	</div>
    	
    </body>
</html>