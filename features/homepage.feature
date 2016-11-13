Feature: Homepage

  Scenario: Opening homepage
    Given I am on homepage
    Then I should see "belajar test php" in the "h1.title" element
