import React, { Component } from 'react';
import './SearchBar.css';

class SearchBar extends Component {
  render() {
    return (
      <div className="search-bar">
        <label htmlFor={this.props.Id}> {this.props.Icon} </label>
        <input
          placeholder={this.props.Placeholder}
          id={this.props.Id}
        />
      </div>
    );
  }
}

export default SearchBar;
