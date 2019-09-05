import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Category extends Component {

	render(){
		return (
			
			<div class="container">
				<div class="row">
					<main class="col col-xl-10C order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
						<h1> Can you see this </h1>
					</main>	
				</div>
			</div>	


			);
	}
}

if (document.getElementById('content')) {
    ReactDOM.render(<Category />, document.getElementById('content'));
}
