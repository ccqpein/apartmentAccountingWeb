(load "~/quicklisp/setup.lisp")
(ql:quickload :clack)

(defvar *handler*
    (clack:clackup
      (lambda (env)
        (declare (ignore env))
        '(200 (:content-type "text/plain") ("Hello, Clack!")))))
