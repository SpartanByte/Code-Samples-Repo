import React from 'react'
import { formatDate } from '../helpers'

class ArticlesIndexTable extends React.Component{
    
    constructor(props) {
        super(props);
        this.state={articles: this.props.articles}
    }

    // Ajax call to delete an article, then update the state to remove the deleted article from the list
    deleteArticle = (event, id, index) => {
        event.preventDefault();
        if (confirm("Are you sure?")){
            fetch(`${this.props.articlePath}/${id}`,{
                method: 'DELETE',
                headers: {
                    'X-CSRF-Token': this.props.csrfToken
                },
            })
            .then(response => response.json())
            .then((data) => {
                if (typeof (data.message) != "undefined" && data.message == "success") {
                    let articleList = this.state.articles;
                    articleList.splice(index, 1);
                    this.setState({ articles: articleList });
                }
            })
        }
    }

    render(){
        return(
            <div>
                <table className="table table-striped" id="article-index-table">
                    <thead>
                        <th>Headline</th>
                        <th></th>
                    </thead>
                    <tbody>
                        {this.state.articles.map((article, index) =>
                            <tr key={index}>
                                <td><a href={this.props.articlePath + "\\" + article.id}>{article.headline}</a></td>
                                <td>{<a href="#" className="btn btn-danger" onClick={(event) => {this.deleteArticle(event, article.id, index) }}>Delete</a>}</td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        );
    }
}

export default ArticlesIndexTable