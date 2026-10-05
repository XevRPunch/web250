# Bike and Bird Challenge

## Student
Xev Punch

## Course
WEB 250

## Project Overview
The Bike and Bird challenge demonstrates the creation and use of php Classes.
It also shows hoe the logic of one program can be copied to create a different one.

## Bike Challenge
The bike challenge makes an html table from a csv of bikes.

## Bird Challenge
The bird challenge makes an html table from a csv of birds.

## Go Further Choices
1. Choice: 4
What you added:
__toString() function in the Bird class describes the bird in a sentence.
Automatically called when a Bird object is meant to be in the form of a string.

2. Choice: 6
What you added:
birds.php parses a second csv now. Counts the rows in each csv separately.

## Concept Check

### 1. Static Property vs Constant
Delimiter is approriate for a static because it exists to be changed, and this is
done outside of the individual ParseCSV objects.
CATEGORIES is a constant because it does not need to change.  

### 2. Constructor `$args` Array
There is no problem if somebody reorders the CSV columns because the $args array is
based on string keys rather than numerical indices.
If it used ten positional parameters it would break if the CSV columns were reordered.

### 3. Public vs Protected
The setters of $wingspan_cm guarentees that the weights of birds are all measured in the
same unit of measurement by converting to that unit if it is not already being used.

### 4. Private `reset()`
If an outside page could call reset(), it can cause the parser to break if reset() is
called after parsing and before calling last_results()

### 5. `self::CONSERVATION_OPTIONS`
self is used to refer to the class itself. $this is used to refer to the object of a
class. self:: is used for constants because they are universal across every instance
of an class.

### 6. `money_format()` vs `number_format()`
money_format() added the dollar sign. With number_format(), this is to be added separately.

## Git History
\*   01d5e15 (HEAD -> main) Merge branch 'asgn05-bird'  
|\    
| * b0fa938 (asgn05-bird) Completed asgn05-bird  
| * 82f8969 Mostly finished bird.class.php. Want to test some things before proceeding with TODOs 2, 9, 10. Further progress on birds.php would be nice for testing those.  
\* | cee0463 (origin/main, origin/asgn05-bike, origin/HEAD, asgn05-bike) Added comment to parsecsv.class.php that I had forgotten to save previously  
|/    
\* 36778c6 Completed work on asgn05-bike  
\* eb882d2 Started work on asgn05-bike  

## AI Log
Forgot to keep track.. Used twice or thrice for debugging.
No AI-generated code was used.
