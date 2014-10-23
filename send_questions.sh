recipients="johnrobboard@gmail.com,johnsBogAcc@gmail.com"
textdoc="/home3/springq0/public_html/johnrobboard/QuestionBox/questions.txt"

echo "Questions from the 24/7 Youth Group's virtual question box." | mail -s Questions -a $textdoc $recipients

if [ "$?" = "1" ]; then
	echo "No questions this week from 24/7 Youth Group's virtual question box." | mail -s Questions $recipients
else
	rm $textdoc
fi

