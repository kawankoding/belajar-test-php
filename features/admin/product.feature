Feature: Admin - Product Management

  Scenario: Viewing list of products
    Given I am on admin dashboard
    When I follow "Products"
    Then I should be on "/admin/products/"
    Then I should see "There is no product"

  Scenario: Add new product
    Given I am on "/admin/products/add"
    When I fill in "name" with "Product 1"
    And I fill in "price" with "50000"
    And I press "Save"
    Then I should be on "/admin/products/"
    And I should see "Product 1" in the "#product-list" element
    And I should see "50000" in the "#product-list" element
