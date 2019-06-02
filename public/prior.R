library(rjson);

x1 <- commandArgs()[5];

xx1 <- fromJSON(x1);

control_ctr <- as.numeric(xx1["control_ctr"]);
ctr_lift <- as.numeric(xx1["ctr_lift"]);
power <- as.numeric(xx1["power"]);
p_value <- as.numeric(xx1["p_value"]);

lifted_ctr <- control_ctr + ctr_lift
result <- power.prop.test(p1=control_ctr, p2=lifted_ctr, power=power, sig.level=p_value, strict=TRUE)

xx1["result_n"] <- result$n;
cat(toJSON(c(xx1["result_n"])));
