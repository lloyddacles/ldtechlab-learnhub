/**
 * PHP Tutorial Website - Client-side JavaScript
 * Handles syntax highlighting and sandbox code execution
 */

document.addEventListener('DOMContentLoaded', function () {

    // === Syntax Highlighting ===
    function highlightPHP(code) {
        // Escape HTML first
        let escaped = code
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');

        // Order matters: comments first, then strings, then everything else

        // Multi-line comments /* ... */
        escaped = escaped.replace(/(\/\*[\s\S]*?\*\/)/g, '<span class="code-comment">$1</span>');

        // Single-line comments // and #
        escaped = escaped.replace(/(\/\/[^\n]*|#(?!{)[^\n]*)/g, '<span class="code-comment">$1</span>');

        // Heredoc/Nowdoc
        escaped = escaped.replace(/(&lt;&lt;&lt;['"]?\w+['"]?[\s\S]*?\w+;)/g, '<span class="code-string">$1</span>');

        // Double-quoted strings (with variable interpolation)
        escaped = escaped.replace(/("(?:[^"\\]|\\.)*")/g, '<span class="code-string">$1</span>');

        // Single-quoted strings
        escaped = escaped.replace(/('(?:[^'\\]|\\.)*')/g, '<span class="code-string">$1</span>');

        // PHP tags
        escaped = escaped.replace(/(&lt;\?php|\?&gt;)/g, '<span class="code-php-tag">$1</span>');

        // Variables
        escaped = escaped.replace(/(\$[a-zA-Z_]\w*)/g, '<span class="code-variable">$1</span>');

        // Keywords
        const keywords = [
            'abstract', 'and', 'array', 'as', 'break', 'callable', 'case', 'catch',
            'class', 'clone', 'const', 'continue', 'declare', 'default', 'die', 'do',
            'echo', 'else', 'elseif', 'empty', 'enddeclare', 'endfor', 'endforeach',
            'endif', 'endswitch', 'endwhile', 'eval', 'exit', 'extends', 'final',
            'finally', 'fn', 'for', 'foreach', 'function', 'global', 'goto',
            'if', 'implements', 'include', 'include_once', 'instanceof', 'insteadof',
            'interface', 'isset', 'list', 'match', 'namespace', 'new', 'or', 'print',
            'private', 'protected', 'public', 'readonly', 'require', 'require_once',
            'return', 'static', 'switch', 'throw', 'trait', 'try', 'unset', 'use',
            'var', 'while', 'xor', 'yield', 'yield_from', 'enum'
        ];
        const kwRegex = new RegExp('\\b(' + keywords.join('|') + ')\\b', 'g');
        escaped = escaped.replace(kwRegex, function (match) {
            // Don't re-highlight inside already highlighted spans
            return '<span class="code-keyword">' + match + '</span>';
        });

        // Constants
        const constants = ['true', 'false', 'null', 'TRUE', 'FALSE', 'NULL', '__LINE__', '__FILE__', '__DIR__', '__FUNCTION__', '__CLASS__', '__TRAIT__', '__METHOD__', '__NAMESPACE__'];
        const constRegex = new RegExp('\\b(' + constants.join('|') + ')\\b', 'g');
        escaped = escaped.replace(constRegex, '<span class="code-constant">$1</span>');

        // Numbers
        escaped = escaped.replace(/\b(\d+\.?\d*)\b/g, '<span class="code-number">$1</span>');

        return escaped;
    }

    // Apply highlighting to all <pre><code> blocks
    document.querySelectorAll('pre code').forEach(function (block) {
        const raw = block.textContent;
        block.innerHTML = highlightPHP(raw);
    });

    // === Sandbox Code Execution ===
    document.querySelectorAll('.sandbox').forEach(function (sandbox) {
        const textarea = sandbox.querySelector('textarea');
        const runBtn = sandbox.querySelector('.run-btn');
        const resultDiv = sandbox.querySelector('.sandbox-result');
        const outputContent = resultDiv ? resultDiv.querySelector('.output-content') : null;

        if (!textarea || !runBtn || !resultDiv) return;

        // Pre-fill with example code if provided (base64-encoded)
        const exampleCode = textarea.getAttribute('data-example');
        if (exampleCode) {
            try {
                textarea.value = atob(exampleCode);
            } catch (e) {
                textarea.value = exampleCode;
            }
        }

        runBtn.addEventListener('click', function () {
            const code = textarea.value.trim();
            if (!code) {
                resultDiv.classList.add('visible');
                outputContent.className = 'output-content output-error';
                outputContent.textContent = 'Please write some code first.';
                return;
            }

            runBtn.disabled = true;
            runBtn.textContent = 'Running...';
            resultDiv.classList.add('visible');
            outputContent.className = 'output-content';
            outputContent.textContent = 'Executing...';

            fetch('/sandbox/execute.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'code=' + encodeURIComponent(code)
            })
            .then(function (response) { return response.json(); })
            .then(function (data) {
                if (data.error) {
                    outputContent.className = 'output-content output-error';
                    outputContent.textContent = data.error;
                } else {
                    outputContent.className = 'output-content';
                    outputContent.textContent = data.output || '(No output)';
                }
            })
            .catch(function (err) {
                outputContent.className = 'output-content output-error';
                outputContent.textContent = 'Connection error: ' + err.message;
            })
            .finally(function () {
                runBtn.disabled = false;
                runBtn.textContent = 'Run Code';
            });
        });

        // Ctrl+Enter to run
        textarea.addEventListener('keydown', function (e) {
            if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                e.preventDefault();
                runBtn.click();
            }
        });
    });

});
