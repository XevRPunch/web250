# WEB-250 — Debugging Setup

**This README is your graded debugging notebook.** Complete the TODOs below with your **own** observations after using VS Code + Xdebug. Do not paste `phpinfo()` output or anything confidential.

## Local setup

- Operating system and local server (Mac/MAMP or Windows/XAMPP): Windows/XAMPP
- PHP version shown in the **browser's phpinfo**: 8.2.12
- Xdebug version: v3.5.3
- Active `php.ini` path (no secrets): C:\xampp\php\php.ini 
- Xdebug / VS Code port (recommended 9003): 9003
- Local Apache port (our class uses 55000): 55000
- Mac/MAMP FastCGI `-idle-timeout 600` configured? (Windows: N/A): N/A
- Mac/MAMP 45-second breakpoint pause, Step Over, Continue test result (Windows: N/A): N/A
- Local exercise index URL: localhost/web250/debugging_setup/index.php
- Hosted exercise index URL: https://xevpunch.nfshost.com/web250/debugging_setup/index.php

## Exercise 01 — Variables and Watch

- Prediction for `$observations` before the `+=` line: 3
- Value before Step Over: 3
- Value after Step Over: 5
- What you learned about the breakpoint and Watch: Nothing much really
- Screenshot: `evidence/01_variables.png` — VS Code paused with a breakpoint and the variables and watch values

## Exercise 02 — Loop and conditional breakpoint

- Predicted total and average: 10, 2.5
- `$total` after the first two iterations: 6
- Values seen when `$dayIndex === 2` (index, count, total): 2, 1, 6
- Why the conditional breakpoint helped: Helps us get values at a specific point of the process
- Screenshot: `evidence/02_conditional.png` — Conditional pause

## Exercise 03 — Step Into / Step Out / Call Stack

- Predicted output: Eastern Towhee: 2 sightings
- Which function called `formatObservation()`?: describeBird
- What Step Into showed that Step Over would skip: The inside of a called function
- Where Step Out returned you: Where I was before stepping in
- Screenshot: `evidence/03_call_stack.png` — Paused function and Call stack

## Exercise 04 — Find and fix the bug

- Original incorrect browser output: "Birds counted: 4"
- Values you observed while stepping through the loop: 2, 3, 4
- Original error and minimal correction (in your words): Used += to add to the total instead of resetting it each time
- Corrected output: "Birds counted: 9"
- Why PHP did not raise an exception: Flawed logic but no php errors
- Screenshot: `evidence/04_fixed_bug.png` — Before the third value is added, $total is 5

## How to view this project

- Local: Open `web250/debugging_setup/index.php` through your MAMP/XAMPP browser URL.
- Webhost: Open the course index and follow the Debugging Setup link.
- GitHub: Link to this folder on `main` in the Moodle Comments area.

**Safety reminder:** Never commit or deploy `php.ini`, `_local_phpinfo.php`, credentials, or logs. The project-level `.vscode/launch.json`, this README, and evidence screenshots belong on **GitHub** but **not** on the public webhost. Never activate Xdebug on your public webhost.
