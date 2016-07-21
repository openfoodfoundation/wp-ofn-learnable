# Learnable

This WordPress plugin creates a post type Learnable, which is used to display a number of
learning resources in a tile view (via shortcode).


## Dependencies

- Advanced Custom Fields - https://www.advancedcustomfields.com/


## Installation

1. Install dependencies
2. Install the plugin
3. Add a custom field 'Link', applying only to post type 'ofn_learnable'
4. Add categories for Learnable post type: Resource, Model, Story

## Usage

- Use the shortcode `[learnables]` to display all learnables in tile view.
- Learnables can be filtered by tags. eg. `[learnables tags='warragul']` shows only learnables tagged with 'warragul'.
  `[learnables tags='warragul,animals']` shows learnables tagged with *both* 'warragul' and 'animals'.
