import React from 'react'
import { formatDate } from '../helpers'

class ArticleShowContainer extends React.Component{
    
    /* This is a React component that receives an article as a prop and displays its details. */
    /* props value set from articles_show.html.erb */
    constructor(props) {
        super(props); 
    }

    render(){
        return(
            <div>
                <p>Headline: {this.props.article.headline}</p>
                <p>Reading Level: {this.props.article.reading_level}</p>
                <p>Issue Date: {formatDate(this.props.article.created_at)}</p>
                <p>Body: </p>
                <div dangerouslySetInnerHTML={{ __html: this.props.article.body_html }} />
            </div>
        );
    }
}

export default ArticleShowContainer