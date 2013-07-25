Feature: Lottery
  In order to get lottery results
  I need to be able to draw few balls and show them in the wright order

Scenario: Draw 4 balls
  Given I have a pool of balls
  When  I draw a 4 balls
  Then  I should get ordered list of drawed balls every time