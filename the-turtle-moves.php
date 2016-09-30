<?php

/**
 * @package The_Turtle_Moves
 * @version 1.0
 */
/*
Plugin Name: The Turtle Moves
Plugin URI: http://trishacornelius.com/wp/the-turtle-moves
Description: A learning exercise which adds a random Terry Pratchett quote at the end of the loop. 
Version: 1.0
Author: Trisha Cornelius
Author URI: http://trishacornelius.com/wp/
License: GPL version 3 + . Quotations copyright Terry and Lyn Pratchett.
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: the_turtle_moves
*/

function get_quote() {
	/**Selected Pratchett Quotes */
	$quotes = "Stories of imagination tend to upset those without one.
A marriage is always made up of two people who are prepared to swear that only the other one snores.
Geography is just physics slowed down, with a couple of trees stuck in it.
An education was a bit like a communicable sexual disease. It made you unsuitable for a lot of jobs and then you had the urge to pass it on
The truth may be out there, but the lies are inside your head.
Give a man a fire and he's warm for the day. But set fire to him and he's warm for the rest of his life.
Real stupidity beats artificial intelligence every time.
In ancient times cats were worshipped as gods. They have not forgotten this.
The space between the young readers eyeballs and the printed page is a holy place and officialdom should trample all over it at their peril.
'Educational' refers to the process, not the object. Although, come to think of it, some of my teachers could easily have been replaced by a cheeseburger.
Dickens, as you know, never got round to starting his home page.
It is said that your life flashes before your eyes just before you die. That is true, it's called Life.
Only in our dreams are we free. The rest of the time we need wages.
The trouble with having an open mind, of course, is that people will insist on coming along and trying to put things in it.
Five exclamation marks, the sure sign of an insane mind.
Taxation is just a sophisticated way of demanding money with menaces.
The pen is mightier than the sword if the sword is very short, and the pen is very sharp
Most of the great triumphs and tragedies of history are caused not by people being fundamentally good or fundamentally evil, but by people being fundamentally people. 
It is well known that a vital ingredient of success is not knowing that what you're attempting can't be done.
Human beings make life so interesting. Do you know, that in a universe so full of wonders, they have managed to invent boredom.
Some humans would do anything to see if it was possible to do it. If you put a large switch in some cave somewhere, with a sign on it saying 'End-of-the-World Switch. PLEASE DO NOT TOUCH', the paint wouldn't even have time to dry.
Wisdom comes from experience. Experience is often a result of lack of wisdom
Personally, I think the best motto for an educational establishment is: 'Or Would You Rather Be a Mule?'.
The whole of life is just like watching a film. Only it’s as though you always get in ten minutes after the big picture has started, and no-one will tell you the plot, so you have to work it out all yourself from the clues. —from Moving Pictures
It’s not worth doing something unless someone, somewhere, would much rather you weren’t doing it.
People don't alter history any more than birds alter the sky, they just make brief patterns in it.
I’d rather be a rising ape than a falling angel.
If there was anything that depressed him more than his own cynicism, it was that quite often it still wasn’t as cynical as real life.
Fantasy is an exercise bicycle for the mind. It might not take you anywhere, but it tones up the muscles that can.
The presence of those seeking the truth is infinitely to be preferred to the presence of those who think they’ve found it.
It’s still magic even if you know how it’s done.
There are times in life when people must know when not to let go. Balloons are designed to teach small children this.
The entire universe has been neatly divided into things to (a) mate with, (b) eat, (c) run away from, and (d) rocks.
Here’s some advice boy. Don’t put your trust in revolutions. They always come around again. That's why they’re called revolutions.
If you don’t turn your life into a story, you just become a part of someone else’s story.
Evil begins when you begin to treat people as things.
Inside every sane person there’s a madman struggling to get out.
Most gods throw dice, but Fate plays chess, and you don't find out til too late that he's been playing with two queens all along.
Pets are always a help in times of stress. And in times of starvation, too, of course.
Goodness is about what you do. Not what you pray to.
The intelligence of that creature known as a crowd is the square root of the number of people in it.
They say a little knowledge is a dangerous thing, but it's not one half so bad as a lot of ignorance.
Time is a drug. Too much of it kills you.
I commend my soul to any God that can find it.
So much universe, and so little time.
'What can I tell you? What do you want to hear? I just wrote down what people know. Mountains rise and fall, and under them the Turtle swims onward. Men live and die, and the Turtle Moves. Empires grow and crumble, and the Turtle Moves. Gods come and go, and still the Turtle Moves. The Turtle Moves.From the darkness came a voice, 'And that is really true?''Didactylos shrugged. 'The turtle exists. The world is a flat disc. The sun turns around it once every day, dragging its light behind it. And this will go on happening, whether you believe it is true or not. It is real. I don't know about truth. Truth is a lot more complicated than that. I don't think the Turtle gives a bugger whether it's true or not, to tell you the truth.'";
 
	//Split the quotes into individual lines
	$quotes = explode("\n", $quotes);

	//And then randomly choose one
	return wptexturize($quotes [mt_rand(0, count($quotes) - 1) ] );
}

//Echo the chosen quote
	function turtle_moves() {
		$chosen = get_quote();
		echo "<p id='turtle'>$chosen - Sir Terry Pratchett</p>";
	}

/*Register after the post content */

add_action('loop_end', 'turtle_moves');

//CSS positioning for turtle moves
function turtle_css() {
	echo "
		<style type='text/css'>
		#turtle {
		font-style: italic;
		background: #fff;
		color: #888;
		border: dotted 1px #888;
		padding: 3px;
		margin: 0 auto;
		font-size: 80%;
	}";
}

add_action('loop_end', 'turtle_css');